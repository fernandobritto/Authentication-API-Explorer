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
            msg: 'Email Invalido',
          },
        },
      },

      password_hach: {
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
      user.password_hach = await bcryptjs.hash(user.password, 8)
    })

    return this
  }
}
