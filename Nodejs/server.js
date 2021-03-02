const express = require('express');
var bodyParser = require('body-parser')
let objModel = require('./obj');
const app = express();
const { check, validationResult } = require('express-validator');

const port = 3000;
app.use(bodyParser.urlencoded({
    extended: true
}));
app.use(bodyParser.json());
const product = [{
    "id": 1,
    "productName": "mobile",
    "price": 2000
}, {
    "id": 2,
    "productName": "laptop",
    "price": 3000
}
];
app.get('/', (req, res) => res.send('Hello World!'));
app.get('/products', (req, res, next) => {
    res.status(200).json(product);
});
app.post('/products', [
    check('productName', 'Product name should be minimum 3 character').isLength({ min: 3 })
], (req, res, next) => {
    const errors = validationResult(req)
    if (!errors.isEmpty()) {
        return res.status(422).json({ errors: errors.array() })
    }
    mod = new objModel(req.body);
    // let obj = {
    //     id: req.body.id,
    //     productName: req.body.productName,
    //     price: req.body.price
    // };
    product.push(mod.getObj());
    res.status(200).json(product);
})
app.delete('/products/:id', (req, res, next) => {
    res.status(200).json(product.filter(val => val.id !== ((parseInt)(req.params.id))));
})
app.listen(port, () => console.log(`Example app listening on port ${port}!`));