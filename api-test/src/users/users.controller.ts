import { Controller, Post, Get, Delete, Param, Body} from '@nestjs/common';
import { UsersService } from './users.service';
import { UserDto } from './dto/user.dto';

@Controller('api/users')
export class UsersController {
  constructor(private readonly usersService: UsersService) {}

  @Post()
  async createUser(@Body()  UserDto: UserDto) {
    return this.usersService.createUser(UserDto);
  }

  @Get(':userId')
  getUser(@Param('userId') userId: string) {
    return this.usersService.getUser(userId);
  }

  @Get(':userId/avatar')
  getUserAvatar(@Param('userId') userId: string) {
    return this.usersService.getUserAvatar(userId);
  }

  @Delete(':userId/avatar')
  deleteUserAvatar(@Param('userId') userId: string) {
    return this.usersService.deleteUserAvatar(userId);
  }
}