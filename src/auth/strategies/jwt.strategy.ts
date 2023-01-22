import { Strategy } from 'passport-jwt'
import { PassportStrategy } from '@nestjs/passport'
import { Injectable, UnauthorizedException } from '@nestjs/common'

import { AuthService } from '../auth.service'
import { JwtPayload } from '../models/jwt-payload.model'
import { User } from '../../users/models/users.model'

@Injectable()
export class JwtStrategy extends PassportStrategy(Strategy) {
  constructor(private readonly authService: AuthService) {
    super({
      jwtFromRequest: authService.returnJwtExtractor(),
      ignoreExpiration: false,
      secretOrKey: process.env.TOKEN_SECRET,
    })
  }

  async validate(jwtPayload: JwtPayload): Promise<User> {
    const user = await this.authService.validateUser(jwtPayload)
    if (!user) {
      throw new UnauthorizedException()
    }

    return user
  }
}
