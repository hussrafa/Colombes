const myTitreHtml = document.querySelector('h1');
myTitreHtml.style.position = "absolute";

let myRightposition = 0;
let myDirection = -1;
let myNewPosition = '';

function myHorizontalSlide() {
    if (myRightposition == 1400) {

        myRightposition = -200;
    }
    //setTimeout(pourrien,1000);
    myRightposition += -2 * myDirection;
    myTitreHtml.style.left = myRightposition + 'px';
    requestAnimationFrame(myHorizontalSlide);
}
requestAnimationFrame(myHorizontalSlide);