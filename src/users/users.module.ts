import { Module } from '@nestjs/common'
import { AuthModule } from '../auth/auth.module'
import { UsersService } from './users.service'
import { UsersController } from './users.controller'
import { UsersSchema } from './schemas/users.schema'
import { MongooseModule } from '@nestjs/mongoose'

@Module({
  imports: [
    MongooseModule.forFeature([
      {
        name: 'User',
        schema: UsersSchema,
      },
    ]),
    AuthModule,
  ],
  controllers: [UsersController],
  providers: [UsersService],
})
export class UsersModule {}
