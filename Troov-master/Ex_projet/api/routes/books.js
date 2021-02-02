const config = require('../config')
const { Router } = require('express')

const router = Router()


const booksController = require('../controllers/booksControllers')


router.get('/books', booksController.list)


router.get('/books/:id', booksController.show)


router.post('/books', config.isAuthenticated, booksController.create)



module.exports = router