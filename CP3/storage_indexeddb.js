/**
 * utilise l'objet IndexedDB pour stocker les donnèes
 * du formulaire sous forme d'objets
 */


const saveWithIndexDB = () => {
    //si IDB est supporté
    if (window.indexedDB) {
        //ouvre la bdd
        let db = window.indexedDB.open("Darons-Coders", 1);
        //definir la structure si besoin : 1er passage seulement
        db.addEventListener("upgradeneeded", () => {
            //connexion a la BDD
            let oDb = db.result;
            //crée objectstore si besoin
            let storeObjet = { autoIncrement: true };
            if (!oDb.objectStoreNames.contains('Repertoire')) {
                let oStrore = oDb.createObjectStore("Repertoire", storeObjet);
                let oIdx = oStrore.createIndex("IndexCP", ['CP']);
            }
        });

        db.addEventListener("success", () => {
            //connexion a la BDD
            let oDb = db.result;
            // Démaree une transaction
            let oTx = oDb.transaction(["Repertoire"], "readwrite");
            // ouvre l'objectstore
            let oStore = oTx.objectStore("Repertoire");
            // Sauvegarde les données du formulaire
            let aElements = document.querySelectorAll('form [name]');
            let oData = {};
            for (let i = 0; i < aElements.length; i++) {
                oData[aElements[i].name] = aElements[i].value;
            }
            // stocke l'objet 
            let oReq = oStore.put(oData);
            // si stockage OK
            oReq.addEventListener("success", () => {
                alert("stockage IDB terminé avec succès");
            });
            oReq.addEventListener("error", (e) => {
                alert("stockage IDB terminé avec failure " + e);
            });

            // si transaction
            oTx.addEventListener("complete", () => {
                oDb.close();
            });
        });

        db.addEventListener("error", () => {
            alert("Erreur de connexion IDB");
        });

    } else {
        alert("IDB non supporté sur ce browser");
    }
}
document.getElementById("IndexedDB").addEventListener("click", () => {
    saveWithIndexDB();
}, false);
