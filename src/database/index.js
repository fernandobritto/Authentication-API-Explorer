import Sequelize from 'sequelize'
import databaseConfig from '../config/database'
import User from '../models/User'

const model = [User]

const connection = new Sequelize(databaseConfig)

model.forEach((model) => model.init(connection))
