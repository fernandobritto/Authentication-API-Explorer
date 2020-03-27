import Sequelize, { Model } from 'sequelize'
import bcryptjs from 'bcryptjs'

export default class User extends Model {
  static init(sequelize){
    super.init({
      name: {
        type: Sequelize.STRING,
        defaultValue: '',
        validate:{
          len:{
            args: [3, 75],
            msg: 'Campo nome deve conter de 3 a 75 caracteres',
          },
        },
      },

      email: {
        type: Sequelize.STRING,
        defaultValue: '',
        unique: {
          msg: 'Email já existe'
        },
        validate:{
          isEmail:{
            msg: 'Email Inválido',
          },
        },
      },

      password_hash: {
        type: Sequelize.STRING,
        defaultValue: '',
      },

      password: {
        type: Sequelize.VIRTUAL,
        defaultValue: '',
        validate:{
          len:{
            args: [6, 25],
            msg: 'A senha presisa ter entre 6 e 25 caracteres',
          },
        },
      },

    }, {sequelize})

    this.addHook('beforeSave', async user => {
      if(user.password){
        user.password_hash = await bcryptjs.hash(user.password, 8)
      }
    })

    return this
  }
}
