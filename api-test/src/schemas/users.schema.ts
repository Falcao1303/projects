import { Schema } from 'mongoose';

export const UserSchema = new Schema({
    id: {
        type: Number,
        required: true,
      },
      email: {
        type: String,
        required: true,
      },
      first_name: {
        type: String,
        required: true,
      },
      last_name: {
        type: String,
        required: true,
      },
      avatar: {
        type: String,
        required: true,
      },
});