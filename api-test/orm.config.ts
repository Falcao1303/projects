import { MongooseModuleOptions } from '@nestjs/mongoose';

export const mongoConfig: MongooseModuleOptions = {
  uri: "mongodb://lucas:gta3gta3@127.0.0.1:27017:27017/testDatabase?authSource=admin&directConnection=true",
  useNewUrlParser: true,
  useUnifiedTopology: true
};

