
var inputs = readline().split(' ');
const lightX = parseInt(inputs[0]); // the X position of the light of power
const lightY = parseInt(inputs[1]); // the Y position of the light of power
const initialTx = parseInt(inputs[2]); // Thor's starting X position
const initialTy = parseInt(inputs[3]); // Thor's starting Y position
let direction = '';

    if ((lightY !== initialTy)) {
        if (lightY >= 9 && initialTy <= 9) {
            direction='S';
        } else if (lightY < 8 && initialTy > 8) {
            direction='N';
        }
    }
    if ((lightX !== initialTx)) {
        if (lightX >= 19 && initialTx <= 19) {
            direction+='E';
        } else if (lightX < 20 && initialTx > 20) {
            direction+='W';
        }
    }

