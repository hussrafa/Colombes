const mongoose = require('mongoose');
const { stringify } = require('querystring');
const Schema = mongoose.Schema;

const Book = new Schema ({
  title: { type: String, required: true, index: { unique: true } },
  author: { type: String, required: true },
  category:{type:String,required:true},
  body: { type: String, required: true },
});

module.exports = mongoose.model('Book', Book)