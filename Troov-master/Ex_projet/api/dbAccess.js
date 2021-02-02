const mongoose = require('mongoose');
mongoose.connect('mongodb://localhost/TroovDb', {
                            useNewUrlParser: true,
                            useUnifiedTopology: true,
                            useFindAndModify: false,
                            useCreateIndex: true
                          });
var db = mongoose.connection;
db.on('error', console.error.bind(console, 'connection error while connecting:'));
db.once('open', function callback () {
  console.log("MongoDB Connected...");
});

module.exports = db