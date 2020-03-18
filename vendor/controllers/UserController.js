import User from '../models/User'

class UserController {
  async store(req, res){
   const newUser = await User.create({
     name: 'Dr. House',
     email: 'drhouse@gmail.com',
     password: '123mudar',
   })
   res.json(newUser)
 }
}

export default new UserController()
