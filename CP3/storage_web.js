/**
 * stockage local avec l'interface
 */

document.getElementById("saveLocal").addEventListener("click", () => {
    //purge toutes les donéees 
    localStorage.clear();
    //stocke chaque donée contenue dans input/select ayant 
    //un attribut name en local
    let controls = document.querySelectorAll('form [name]');
    for (let i = 0; i < controls.length; i++) {
        localStorage.setItem(controls[i].name, controls[i].value);
    }
    //pour lire de local storage
    for (let i = 0; i < localStorage.length; i++) {
        console.log(localStorage.getItem(localStorage.key(i)));
    }
});