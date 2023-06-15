import { NestFactory } from '@nestjs/core';
import { AppModule } from './src/app.module';
import { Mongoose } from 'mongoose';

async function bootstrap() {
  const app = await NestFactory.create(AppModule);
  const mongoose = app.get<Mongoose>(Mongoose);
  mongoose.set('debug', true);
  await app.listen(3800);
}
bootstrap();