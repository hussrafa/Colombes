var inputs = readline().split(' ');
const lightX = parseInt(inputs[0]); // the X position of the light of power
const lightY = parseInt(inputs[1]); // the Y position of the light of power
const initialTx = parseInt(inputs[2]); // Thor's starting X position
const initialTy = parseInt(inputs[3]); // Thor's starting Y position


if ((initialTx < lightX) && (initialTy < lightY)) {
    if ((initialTx !== lightX) && (initialTy !== lightY)) {
        console.log('SE');
    } else {
        if ((lightX != initialTx)) {
            if (lightX >= 19 && initialTx <= 19) {
                console.log('E');
            } else if (lightX < 20 && initialTx > 20) {
                console.log('W');
            }
        }
        if ((lightY != initialTy)) {
            if (lightY >= 9 && initialTy <= 9) {
                console.log('S');
            } else if (lightY < 8 && initialTy > 8) {
                console.log('N');
            }
        }
    }
} else if ((initialTx > lightX) && (initialTy > lightY)) {
    if ((initialTx !== lightX) && (initialTy !== lightY)) {
        console.log('SW');
    } else {
        if ((lightX != initialTx)) {
            if (lightX >= 19 && initialTx <= 19) {
                console.log('E');
            } else if (lightX < 20 && initialTx > 20) {
                console.log('W');
            }
        }
        if ((lightY != initialTy)) {
            if (lightY >= 9 && initialTy <= 9) {
                console.log('S');
            } else if (lightY < 8 && initialTy > 8) {
                console.log('N');
            }
        }
    }
}
else if ((initialTx > lightX) && (initialTy < lightY)) {
    if ((initialTx !== lightX) && (initialTy !== lightY)) {
        console.log('NW');
    } else {
        if ((lightX != initialTx)) {
            if (lightX >= 19 && initialTx <= 19) {
                console.log('E');
            } else if (lightX < 20 && initialTx > 20) {
                console.log('W');
            }
        }
        if ((lightY != initialTy)) {
            if (lightY >= 9 && initialTy <= 9) {
                console.log('S');
            } else if (lightY < 8 && initialTy > 8) {
                console.log('N');
            }
        }
    }
} else if ((initialTx < lightX) && (initialTy > lightY)) {
    if ((initialTx !== lightX) && (initialTy !== lightY)) {
        console.log('NE');
    } else {
        if ((lightX != initialTx)) {
            if (lightX >= 19 && initialTx <= 19) {
                console.log('E');
            } else if (lightX < 20 && initialTx > 20) {
                console.log('W');
            }
        }
        if ((lightY != initialTy)) {
            if (lightY >= 9 && initialTy <= 9) {
                console.log('S');
            } else if (lightY < 8 && initialTy > 8) {
                console.log('N');
            }
        }
    }
}