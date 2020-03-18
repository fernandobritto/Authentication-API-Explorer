//import User from '../models/User'

class HomeController {
  index(req, res){
   // const newUser = await User.create({
   //   name: 'Gabriel',
   //   lastname: 'Pinheiro',
   //   email: 'titinhodocell@gmail.com',
   //   age: 18,

   // })
   res.json({
     "tudoCerto": true
     // explorerApi: true
   })
 }
}

export default new HomeController()
