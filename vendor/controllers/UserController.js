import User from '../models/User'

class UserController {
  async start(req, res){
      const newUsers = await User.create({
        name: 'Fernando',
        email: 'me@fernandobritto.com.br',
        password: '1q2w3e4r',
      })
      return res.json(newUsers)
  }


  async index(req, res){
    try{
      const users = await User.findAll()
      return res.json(users)
    } catch(e){
      return res.json(null)
    }
  }

  async show(req, res){
    try{
      const user = await User.findByPk(req.params.id)
      return res.json(user)
    } catch(e){
      return res.json(null)
    }
  }

  async store(req, res){
   try{
    const newUser = await User.create(req.body)
    return res.json(newUser)
   } catch (e){
    return res.status(400).json({
      errors: e.errors.map((err) => err.message),
    })
   }
 }

 async update(req, res){
  try{

    if(!req.params.id){
      return res.status(400).json({
        errors:['ID não enviado']
      })
    }

    const user = await User.findByPk(req.params.id)

    if(!user){
      return res.status(400).json({
        errors:['Usuário não existe!']
      })
    }

    const newInfos = await user.update(req.body)
    return res.json(newInfos)

  } catch(e){
    return res.json(null)
  }
}

async delete(){
  try{

    if(!req.params.id){
      return res.status(400).json({
        errors:['ID não enviado']
      })
    }

    const user = await User.findByPk(req.params.id)

    if(!user){
      return res.status(400).json({
        errors:['Usuário não existe!']
      })
    }

    await user.destroy()
    return res.json(user)

  } catch(e){
      errors: e.errors.map((err) => err.message)
  }
}


}

export default new UserController()

