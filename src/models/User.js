import Sequelize, { Model } from 'sequelize'

export default class User extends Model {
  static init(sequelize){
    super.init({
      name: Sequelize.STRING,
      lastname: Sequelize.STRING,
      email: Sequelize.STRING,
      age: Sequelize.INTEGER,

    }, {sequelize})
    return this
  }

}
