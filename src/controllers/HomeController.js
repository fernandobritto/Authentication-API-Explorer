
class HomeController {
  index(req, res){
    res.json({
      explorerApi: true
    })
  }
}

export default new HomeController()
