import Sequelize, { Model } from 'sequelize'

export default class Customer extends Model {
  static init(sequelize){
    super.init({
      name: Sequelize.STRING,
      email: Sequelize.STRING,
      password_hach: Sequelize.STRING,
      password: Sequelize.VIRTUAL,

    }, {sequelize})
    return this
  }

}
