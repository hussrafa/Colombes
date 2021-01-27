/*
*Branchement l'èvenelent LOAD a WINDOW
*/
window.addEventListener(
    "load",
    () => {
        loadDataWithFetch();
    },
    false
)

const loadData = () => {
    //step 1 : Instanciation de la requéte AJAX
    let oXHR = new XMLHttpRequest;
    //step 2 : ouverture requéte AJAX
    oXHR.open("get", "https://restcountries.eu/rest/v2/all", true);
    //step 3 : Envoi requéte AJAX
    oXHR.send();
    //step 4 : Traitement retour du serveur
    oXHR.addEventListener("readystatechange",
        () => {
            if (oXHR.status === 200 && oXHR.readyState === 4) {
                // Transforme la rèponse texte en objet
                let oData = JSON.parse(oXHR.responseText);
                // Pour chaque pays de l'objet rèponse
                let oOption;
                for (let i = 0; i < oData.length; i++) {
                    oOption = document.createElement('option');
                    oOption.value = oData[i].alpha2Code;
                    oOption.text = oData[i].translations.fr;
                    //séléction fr par default
                    oData[i].alpha2Code.toLowerCase() == "fr" ? oOption.selected = true : oOption.selected = false;
                    //Attache l'enfant OPTION à son parent SELECT
                    document.getElementById("land").appendChild(oOption);
                }
            }
        }, false
    )
}

document.getElementById("CP").addEventListener("blur", () => {
    getCityWithAwait(document.getElementById("land").value, document.getElementById("CP").value);
    // let b = getCity(document.getElementById("land").value, document.getElementById("CP").value);
    // b.then(a =>
    //     document.getElementById("Ville").value = a[0]
    // );

});
document.getElementById("land").addEventListener("change", () => {
    document.getElementById("CP").value = "";
    document.getElementById("Ville").value = "";
});


function getCity(sLand, sZip) {
    return new Promise(function testpromise(resolve, reject) {
        let aCities = []; let oXhr = new XMLHttpRequest;
        oXhr.open('get', 'https://api.zippopotam.us/' + sLand + '/' + sZip, true);
        oXhr.send();
        oXhr.addEventListener('readystatechange',
            () => {
                if (oXhr.readyState === 4 && oXhr.status === 200) {
                    let oData = JSON.parse(oXhr.responseText);
                    for (let i = 0; i < oData.places.length; i++) {
                        let c = (oData.places[i]["place name"]).toString();
                        aCities[i] = c;
                    }
                    resolve(aCities);
                }
            }, false
        );
    });
};

const getCityWithAwait = async (countryCode, pin) => {
    try {
        await fetch("https://api.zippopotam.us/" + countryCode + "/" + pin + "").then(
            res => {
                if (res.ok) {
                    return res.json()
                } else {
                    throw Error(`Request rejected with status ${res.status}`);
                }
            }
        ).then(
            x => {
                document.getElementById("Ville").value = "";
                if (Object.keys(x).length > 0) {
                    if (x.places.length >= 1) {
                        document.getElementById("Ville").value = x.places[0]["place name"];
                    }
                }
            }
        ).catch(e => { console.log(e) });
    }

    catch (e) {
        console.log(e);
    }
}

const loadDataWithFetch = async () => {
    let oOption;
    await fetch("https://restcountries.eu/rest/v2/all").then(
        response => response.json()
    ).then(
        x => {
            x.map(
                y => {
                    oOption = document.createElement('option');
                    oOption.value = y.alpha2Code;
                    oOption.text = y.translations.fr;
                    //Attache l'enfant OPTION à son pare
                    y.alpha2Code.toLowerCase() == "fr" ? oOption.selected = true : oOption.selected = false;
                    document.getElementById("land").appendChild(oOption);
                }
            )
        }
    )
}

document.getElementById('jreste').addEventListener("click", () => {
    document.getElementById("cAlert").style.display = "none";
})
document.getElementById('dismiss').addEventListener("click", () => {
    document.getElementById("cAlert").style.display = "none";
})

