const express = require('express')
const db = require('./dbAccess')


// Create express instnace
const app = express()

// Init body-parser options (inbuilt with express)
app.use(express.json());
app.use(express.urlencoded({ extended: true }));

// Require & Import API routes
const users = require('./routes/users')
const books = require('./routes/books')

// Use API Routes
app.use(users)
app.use(books)

// Export the server middleware
module.exports = {
  path: '/api',
  handler: app
}