import dotenv from 'dotenv'
dotenv.config()

import './vendor/database'

import express from 'express'


class App {
  constructor(){
    this.app = express()
    this.middlewares()
    this.routes()
  }

  middlewares(){
    this.app.use(express.urlencoded({ extended: true }))
    this.app.use(express.json())
  }

  routes(){
    this.app.use('/', userRoutes)
  }
}

export default new App().app
