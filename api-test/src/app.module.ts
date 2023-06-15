import { Module } from '@nestjs/common';
import { MongooseModule } from '@nestjs/mongoose';
import { APP_INTERCEPTOR } from '@nestjs/core'; 
import { UsersController } from './users/users.controller';
import { UsersService } from './users/users.service';
import { UserSchema } from './schemas/users.schema';
import { mongoConfig } from '../orm.config';
import { resolve } from 'path';
import { config } from 'dotenv';
import { DebugInterceptor } from './interceptors/debug.inteceptor';
config({ path: resolve(__dirname, '../.env') });

@Module({
  imports: [
    MongooseModule.forRoot('mongodb://localhost:27017/testDatabase',{
      user: 'lucas',
      pass: 'admin',
  }),
    MongooseModule.forFeature([{ name: 'User', schema: UserSchema }]),
  ],
  controllers: [UsersController],
  providers: [
    UsersService,
    {
      provide: APP_INTERCEPTOR,
      useClass: DebugInterceptor,
    },
  ],
})
export class AppModule {
  onModuleInit() {
    console.log('Connected to database successfully!',process.env.MONGO_URI);
    if (!process.env.TEST_ENV) {
      console.log('Connected to database successfully!');
    }
  }
}