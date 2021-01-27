/**
 * Ecrit un cookie dans le domaine en cours
 * @param {string} name- nom du cookie
 * @param {string} value - valeur du cookie
 * @param {number} duration - durèe de vie du cookie(en jours)
 */

document.getElementById("saveCookie").addEventListener("click", () => {
    // let invalue = [];
    // Array.from(document.querySelectorAll("input[type=text],select")).map(x => {
    //     invalue.push(x.value);
    // });
    // writeCookie(document.getElementById("fname").value, invalue.slice(0, invalue.length - 1).join(","), 1);
    if ((document.getElementById("fname").value) !== "") {
        let controls = [];
        let inputvalues = "";
        controls = document.querySelectorAll("form [name]:not([name=fname])");
        console.log(controls);
        for (let i = 0; i < controls.length; i++) {
            inputvalues += (i === controls.length - 1) ? (controls[i].value) : (controls[i].value + ",");
        }
        writeCookie(document.getElementById("fname").value, inputvalues, 1);
    } else {
        alert("Name required");
    }
});

function writeCookie(name, value, duration) {
    let dToday = new Date();
    // Test si duration est un nombre
    if (isNaN(duration)) {
        throw 'La durée doit etre un nombre de jours';
    } else {
        // Date du jour 
        //Ajoute la durée a aujourd'hui
        dToday.setTime(dToday.getTime() + duration * 24 * 60 * 60 * 1000);
    }
    //Ecrit le cookie
    let sCookie = name + '=' + value + ';expires=' + dToday.toLocaleString() + ';path';
    //pour firefox
    if (navigator.userAgent.toLowerCase().indexOf("firefox") > 0) {
        sCookie += '=;SameSite=None;Secure';
    }
    document.cookie = sCookie;
}

/**
 * Lit un cookie dans le domaine en cours
 * @param {string} name - nom du cookie
 * @return {string} 
 */

function readcookie(name) {
    let aCookies = document.cookie.split(";");
    for (let i = 0; i < aCookies.length; i++) {
        if (aCookies[i].trim().indexOf(name + "=") >= 0) {
            let aCookie = aCookies[i].split('=');
            return aCookie[1];
        }
    }
}

/**
 * Supprime le cookie dans le domaine en cours
 * 
 */

function clearCookie(name) {
    writeCookie(name, '', -1);
}

document.getElementById("dob").addEventListener("change", () => {
    let ddiff = dateDiff(document.getElementById("dob").value, new Date());
    document.getElementById("age").value = ddiff.years;
})

function dateDiff(d1, d2) {
    d1 = new Date(d1);
    d2 = new Date(d2);
    let diff = 0;
    if (d1 > d2) {
        diff = d1 - d2;
    } else {
        diff = d2 - d1;
    }
    return convertMS(diff);

}

function convertMS(milliseconds) {
    var day, hour, minute, seconds, years;
    years = Math.floor(milliseconds / 1000 / 60 / 60 / 24 / 365.25)
    seconds = Math.floor(milliseconds / 1000);
    minute = Math.floor(seconds / 60);
    seconds = seconds % 60;
    hour = Math.floor(minute / 60);
    minute = minute % 60;
    day = Math.floor(hour / 24);
    hour = hour % 24;
    return {
        day: day,
        hour: hour,
        minute: minute,
        seconds: seconds,
        years: years
    };
}

