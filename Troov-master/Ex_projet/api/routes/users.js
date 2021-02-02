const config = require('../config')
const { Router } = require('express')

const router = Router()


const usersController = require('../Controllers/usersControllers')


router.post('/users/register', usersController.register)


router.post('/users/login', usersController.login)


router.get('/users/user', usersController.user)

module.exports = router