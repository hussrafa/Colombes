alert("test");


let r = 1;
let c = 6;
let newr;
newr = r;
r = c;
c = newr;
console.log(r);
console.log(c);
/* */


var replay = true;

while (replay) {
    var randomno = Math.ceil(Math.random() * 10);
    console.log("Random Number: " + randomno);
    var validnumber = true;
    while (validnumber) {
        var usernumber = Number(prompt("Enter the number"));
        if (usernumber == null || usernumber == "undefined" || isNaN(usernumber) || usernumber > 10) {
            console.log("Not a valid number");
        } else {
            validnumber = false;
        }
    }
    let me = false;
    do {
        if (randomno > usernumber) {
            console.log("trop petit");
        } else if (randomno < usernumber) {
            console.log("trop grand");
        } else {
            me = true;
            console.log("Bravo");
        };
        var reply = prompt("Do you want to continue ? y/n");
        if (reply.toLowerCase() == "n") {
            replay = false;
            me = true;
            console.log("Bye");
        } else if (reply.toLowerCase() == "y") {
            validnumber = true;
            replay = true;
            me = true;
        } else if (reply.toLowerCase() != "y") {
            replay = false;
            me = true;
            console.log("Invalid Input Program terminated");
        }
    } while (!me)
}




let l = 3;
switch (l) {
    case 0:
        console.log("case 0");

    case 1:
        console.log("case 1");

    case 2:
        console.log("case 2");

    case 3:
        console.log("case 3");

    case 4:
        console.log("case 4");

    case 5:
        console.log("case 5");

    default:
        console.log("case default");
}


function mutiply(x, y) {
    return x * y;
}

var myresult = (function(n, p) {
    var r = 1;
    for (let i = 1; i <= p; i++) {
        r = mutiply(r, n);
    }
    return r;
})(2, 3);

console.log(myresult);

function max(...numbers) {
    let result = -Infinity;

    for (let number in numbers) {
        if (number > result) {
            result = number;
        }
        return result;
    }
}

let nearesttozero = (...numbers) => {

    let r = Infinity;
    for (let number of numbers) {
        if (r === Infinity) {
            r = number;
        } else if (r > number) {
            r = number;
        }

    }

    return r;

}


let logme = (prefix) => {
    return (message) => {
        console.log(prefix + " " + message);
    }
}

/* Shorthand code */
let logme = (prefix) => (message) => console.log(prefix + " " + message);


let doubler = (...nt) => {
    for (let i = 0; i < nt.length(); i++) {
        nt[i] *= 2;
    }
}