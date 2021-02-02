
const validator = require('express-validator');
const Book = require('../model/Book');

// Get all
module.exports.list = function (req, res, next) {
  Book.find({}, function(err, book){
    if(err) {
        return res.status(500).json({
            message: 'Error getting records.'
        });
    }
    return res.json(book);
  });
}


// Get one
module.exports.show = function(req, res) {
  var id = req.params.id;
  Book.findOne({_id: id}, function(err, book){
      if(err) {
          return res.status(500).json({
              message: 'Error getting record.'
          });
      }
      if(!book) {
          return res.status(404).json({
              message: 'No such record'
          });
      }
      return res.json(book);
  });
}


// Create
module.exports.create = [
  // validations rules
  validator.body('title', 'Please enter Book Title').isLength({ min: 1 }),
  validator.body('title').custom(value => {
    return Book.findOne({title:value}).then(book => {
      if (book !== null) {
        return Promise.reject('Title already in use');
      }
    })
  }),
  validator.body('category', 'Please enter category Name').isLength({ min: 1 }),
  validator.body('author', 'Please enter Author Name').isLength({ min: 1 }),
  
  validator.body('body', 'Please enter Book Content').isLength({ min: 1 }),

  function(req, res) {
    // throw validation errors
    const errors = validator.validationResult(req);
    if (!errors.isEmpty()) {
      return res.status(422).json({ errors: errors.mapped() });
    }

    // initialize record
    var book = new Book({
        title : req.body.title,
        author : req.body.author,
        category:req.body.category,
        body : req.body.body,
    })

    // save record
    book.save(function(err, book){
        if(err) {
            return res.status(500).json({
                message: 'Error saving record',
                error: err
            });
        }
        return res.json({
            message: 'saved',
            _id: book._id
        });
    })
  }
]

