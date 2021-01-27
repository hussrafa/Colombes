class X {
    get y() { return 42; }
}

var x = new X();

console.log(x.y);


console.log(sum(10,20));
console.log(diff(10,20));
function sum(x, y) {
    return x + y;
}

let diff =  (x, y) =>{
    return x - y;
}
