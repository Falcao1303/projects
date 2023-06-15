import { Injectable } from '@nestjs/common';
import axios from 'axios';
import { v4 as uuid } from 'uuid';
import * as fs from 'fs';
import * as path from 'path';
import { InjectModel } from '@nestjs/mongoose';
import { connect, Channel } from 'amqplib';
import { Model } from 'mongoose';
import { User } from './interface/user.interface';
import { UserDto } from './dto/user.dto';

@Injectable()
export class UsersService {
    private rabbitChannel: Channel;

    constructor(@InjectModel('User') private readonly userModel: Model<any>) {
      this.setupRabbitMQ();
    }

  async createUser(createUserDto: UserDto): Promise<User>  {
    const { name, job } = createUserDto;

    const newUser = new this.userModel({
      name,
      job,
    });

    const createdUser = await newUser.save();

    // Envie o e-mail (implementação fictícia)
    this.sendEmail(createdUser.email);

    // Envie o evento do RabbitMQ (implementação fictícia)
    this.sendRabbitEvent(createdUser);

    return createdUser;
  }

  async getUser(userId: string) {
    const response = await axios.get(`https://reqres.in/api/users/${userId}`);
    return response.data;
  }

  async getUserAvatar(userId: string) {
    const user = await this.userModel.findOne({ userId });

    if (user && user.avatar) {
      const filePath = path.join(__dirname, '..', 'avatars', user.avatar);
      const fileExists = fs.existsSync(filePath);

      if (fileExists) {
        const fileData = fs.readFileSync(filePath);
        const base64EncodedData = fileData.toString('base64');
        return base64EncodedData;
      }
    }

    const response = await axios.get(`https://reqres.in/api/users/${userId}/avatar`);
    const base64EncodedData = response.data; // Assuming the response is already base64-encoded

    const fileName = `${userId}_${uuid()}.png`;
    const filePath = path.join(__dirname, '..', 'avatars', fileName);
    fs.writeFileSync(filePath, Buffer.from(base64EncodedData, 'base64'));

    if (user) {
      user.avatar = fileName;
      await user.save();
    }

    return base64EncodedData;
  }

  async deleteUserAvatar(userId: string) {
    const user = await this.userModel.findOne({ userId });

    if (user && user.avatar) {
      const filePath = path.join(__dirname, '..', 'avatars', user.avatar);
      fs.unlinkSync(filePath);
      user.avatar = null;
      await user.save();
    }

    return { message: 'User avatar deleted.' };
  }

  private sendEmail(email: string): void {
    // Implemente a lógica fictícia para enviar o e-mail
    console.log(`Enviando e-mail para: ${email}`);
  }

  private async setupRabbitMQ(): Promise<void> {
    const connection = await connect('amqp://localhost');
    const channel = await connection.createChannel();
    this.rabbitChannel = channel;
  }

  private sendRabbitEvent(user: User): void {
    const message = JSON.stringify(user);
    this.rabbitChannel.sendToQueue('my_queue', Buffer.from(message));
  }

}

