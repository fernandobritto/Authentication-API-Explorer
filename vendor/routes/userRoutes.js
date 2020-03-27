import { Router} from 'express'
import userController from '../controllers/UserController'

const router = new Router()

router.post('/app', userController.start)
router.get('/', userController.index)
router.get('/:id', userController.show)
router.post('/', userController.store)
router.put('/:id', userController.update)
router.delete('/:id', userController.delete)

export default router
