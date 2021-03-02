class dataModel {
    constructor(obj) {
        this.donee = {
            "id": obj.id, "productName": obj.productName, "price": obj.price
        }
    }
    getObj() {
        return this.donee;
    }

}

module.exports = dataModel;
