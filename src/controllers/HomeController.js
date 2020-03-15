import User from '../models/User'

class HomeController {
  async index(req, res){
    const newUser = await User.create({
      name: 'Gabriel',
      lastname: 'Pinheiro',
      email: 'titinhodocell@gmail.com',
      age: 18,

    })
    res.json({
      explorerApi: true
    })
  }
}

export default new HomeController()
