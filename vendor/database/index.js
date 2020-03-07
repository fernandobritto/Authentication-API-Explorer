const mongoose = require('mongoose')

mongoose.connect('mongodb://*******************', { useMongoClient: true })

//Config. Padrão: classe de Promises do Mongo
mongoose.Promise = global.Promise

module.exports = mongoose
