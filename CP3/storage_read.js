
document.getElementById("readCookie").addEventListener("click", () => {
    // let key = "";
    // let valeur = "";
    // let elem = "";
    // let child = "";
    // let aCookies = document.cookie.split(";");
    // for (let i = 0; i < aCookies.length; i++) {
    //     key = aCookies[i].split("=")[0].trim();
    //     valeur = readcookie(key);
    //     elem = document.createElement("tr");
    //     child = document.createElement("td");
    //     child.innerText = key;
    //     elem.appendChild(child);
    //     child = document.createElement("td");
    //     child.innerText = valeur;
    //     elem.appendChild(child);
    //     document.getElementById("tb").appendChild(elem);
    // }
    fnSansDouble();
})


const fnSansDouble = () => {
    let elem = "";
    let child = "";
    document.getElementById("tb").innerHTML = "";
    let aCookies = document.cookie.split(";");
    for (let i = 0; i < aCookies.length; i++) {
        elem = document.createElement("tr");
        child = document.createElement("td");
        child.innerText = aCookies[i].split("=")[0].trim();
        elem.appendChild(child);
        child = document.createElement("td");
        child.innerText = aCookies[i].split("=")[1];
        elem.appendChild(child);
        document.getElementById("tb").appendChild(elem);
    }
}


function readcookie(name) {
    let aCookies = document.cookie.split(";");
    for (let i = 0; i < aCookies.length; i++) {
        if (aCookies[i].trim().indexOf(name + "=") >= 0) {
            let aCookie = aCookies[i].split('=');
            return aCookie[1];
        }
    }
}
// /**
//  * 
//  * @param {string} date1 DOB
//  * @param {string} date2 Date to calculate
//  */
// const dateDiff = (date1, date2) => {
//     if (date1 == "" || isNaN(new Date(date1))) {
//         throw "Date1 is not valid";
//     }
//     if (date2 == "" || isNaN(new Date(date2))) {
//         throw "Date2 is not valid";
//     }
//     let d1 = new Date(date1.trim());
//     let d2 = new Date(date2.trim());
//     let no = ((d1.getFullYear() - d2.getFullYear()) * 12) - d2.getMonth();
//     let diffYears = d1.getFullYear() - d2.getFullYear();
//     console.log(no + " months");
//     if (d1.getMonth() > d2.getMonth()) {
//         diffYears--

//     }
//     else {
//         if (d1.getMonth() == d2.getMonth()) {
//             if (d1.getDate() > d2.getDate()) diffYears--;
//         }
//     }
//     console.log(diffYears);
//     console.log((diffYears) + " years " + ((12 - ((d1.getMonth() - d2.getMonth()) < 0 ? (d1.getMonth() - d2.getMonth()) * -1 : (d1.getMonth() - d2.getMonth())))) + " months");
// }

//dateDiff("1991-02-24", "2021-01-25");
/**
 * 
 * @param {string} dateold  
 * @param {string} datenew 
 */
function dateDiff(dateold, datenew) {

    if (dateold == "" || isNaN(new Date(dateold))) {
        throw "DateOld is not valid";
    }
    if (datenew == "" || isNaN(new Date(datenew))) {
        throw "DateNew is not valid";
    }
    dateold = new Date(dateold);
    datenew = new Date(datenew);
    let ynew = datenew.getFullYear();
    let mnew = datenew.getMonth();
    let dnew = datenew.getDate();
    let yold = dateold.getFullYear();
    let mold = dateold.getMonth();
    let dold = dateold.getDate();
    let diffYears = ynew - yold;
    if (mold > mnew) {
        diffYears--
    }
    else {
        if (mold == mnew) {
            if (dold > dnew) diffYears--;
        }
    }
    let noOfMonths = (diffYears * 12) - mnew;
    console.log(noOfMonths + " Months");
    let diffMonth = mnew - mold;
    return diffYears + " years " + (((diffMonth) < 0 ? 12 - ((diffMonth) * -1) : (diffMonth == 0) ? diffMonth : 12 - diffMonth)) + " months";
}

//dateDiff("1991-11-02", "2021-01-25");


document.getElementById("ReadLocal").addEventListener("click", () => {
    let elem = "";
    let child = "";
    document.getElementById("tblLocal").innerHTML = "";
    //pour lire de local storage
    for (let i = 0; i < localStorage.length; i++) {
        elem = document.createElement("tr");
        child = document.createElement("td");
        // set iteration key name
        var key = localStorage.key(i);
        child.innerText = localStorage.key(i);
        elem.appendChild(child);
        child = document.createElement("td");
        child.innerText = localStorage.getItem(localStorage.key(i));
        elem.appendChild(child);
        document.getElementById("tblLocal").appendChild(elem);
    }
});
function getKeys(key) {
    let keysResult = [];
    return new Promise(function (resolve) {
        for (let i = 0; i < key.length; i++) {
            (keysResult.push(key[i]));
        }
        resolve(keysResult);
    })
}

function getValues(key) {
    let keysResult = [];
    return new Promise(function (resolve) {
        for (let i = 0; i < key.length; i++) {
            (keysResult.push(key[i]));
        }
        resolve(keysResult);
    })
}
document.getElementById("ReadIndexed").addEventListener("click", () => {
    if (window.indexedDB) {
        let db = window.indexedDB.open("Darons-Coders", 1);
        db.addEventListener("upgradeneeded", () => {

        })
        db.onerror = function (e) {
            console.err("error fetching data " + e);
        };
        db.onsuccess = function (e) {
            let oDb = db.result;
            transaction = oDb.transaction(["Repertoire"], "readonly");
            object_store = transaction.objectStore("Repertoire");
            keys = object_store.getAllKeys();
            request = object_store.getAll();

            let keysResult = [];
            let a, b;

            keys.onsuccess = () => {
                a = getKeys(keys.result).then((e) => {
                    keysResult = e
                    console.log(e);
                });

            }
            request.onsuccess = function () {
                let r = [];
                let elem = "";
                let child = "";
                document.getElementById("tblIndexeed").innerHTML = "";
                console.log("e", keysResult);
                b = getValues(request.result).then(e => {
                    r = e
                    console.log(r)
                });
                Promise.all([b]).then(function (values) {
                    console.log(values);
                });
                //let [axiosHomeData, axiosUserData] = Promise.all([a, b]);

                for (let i = 0; i < request.result.length; i++) {
                    request.result[i].key = keysResult[i];
                    console.log(request.result[i]);
                    // Object.keys(request.result[i])
                    //     .forEach(function eachKey(key) {
                    //         elem = document.createElement("tr");
                    //         child = document.createElement("td");
                    //         child.innerText = key;
                    //         elem.appendChild(child);
                    //         child = document.createElement("td");
                    //         child.innerText = request.result[i][key];
                    //         elem.appendChild(child);
                    //         document.getElementById("tblIndexeed").appendChild(elem);
                    //     });
                    //console.log(request.result[i]);
                    elem = document.createElement("tr");
                    child = document.createElement("td");
                    child.innerText = i;
                    elem.appendChild(child);
                    child = document.createElement("td");
                    child.innerText = JSON.stringify(request.result[i]);
                    elem.appendChild(child);
                    document.getElementById("tblIndexeed").appendChild(elem);
                }
            };
            request.onerror = (e) => {
                console.err("error reading data " + e);
            }
        };
    } else {
        alert("IDB non supporté sur ce browser");
    }
});
