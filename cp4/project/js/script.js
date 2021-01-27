/*Script JS pour getstion des evenements */

let etatDiv = false;
let etatDiv02 = false;
const Div01 = (moiMeme) => {
    if (!etatDiv) {
        moiMeme.className = "divNoire";
        etatDiv = true;
    } else {
        moiMeme.className = "myDiv";
        etatDiv = false;
    }
}
let elem = document.getElementById('Block02');
const div02 = (e) => {
    console.log(e);
    if (etatDiv02 == false) {
        elem.className = "divNoire";
        etatDiv02 = true;
    } else {
        elem.className = "myDiv";
        etatDiv02 = false;
    }
}

elem.addEventListener('click', div02);