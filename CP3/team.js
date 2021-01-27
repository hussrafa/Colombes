/*
stockage des membres de 1 équipe des darons codeurs au format JSON
*/

let members = [
    {
        "fname": "Emma",
        "sex": "F",
        "age": 23,
        "married": false
    },
    {
        "fname": "Asma",
        "sex": "F",
        "age": 30,
        "married": true
    },
    {
        "fname": "Jeremy",
        "sex": "M",
        "age": 32,
        "married": false
    },
    {
        "fname": "Samir",
        "sex": "M",
        "age": 43,
        "married": true
    },
    {
        "fname": "Aymen",
        "sex": "M",
        "age": 27,
        "married": false
    },
    {
        "fname": "Aymane",
        "sex": "M",
        "age": 19,
        "married": false
    },
    {
        "fname": "Oihid",
        "sex": "M",
        "age": 40,
        "married": false
    },
    {
        "fname": "Remy",
        "sex": "M",
        "age": 42,
        "married": false
    },
    {
        "fname": "Nathan",
        "sex": "M",
        "age": 23,
        "married": false
    },
    {
        "fname": "Kevin",
        "sex": "M",
        "age": 25,
        "married": false
    },
    {
        "fname": "Hakim",
        "sex": "M",
        "age": 24,
        "married": false
    },
    {
        "fname": "Jean-Marc",
        "sex": "M",
        "age": 38,
        "married": true
    },
    {
        "fname": "Thomas",
        "sex": "M",
        "age": 33,
        "married": false
    },
    {
        "fname": "Alex",
        "sex": "M",
        "age": 22,
        "married": false
    },
    {
        "fname": "Lesly",
        "sex": "M",
        "age": 53,
        "married": true
    }
];

let fnDisplay = () => {
    // let dynamichtml = "";
    // for (let i = 0; i < members.length; i++) {
    //     dynamichtml += "<tr><td>" + members[i].fname + "</td>";
    //     dynamichtml += "<td>" + members[i].age + "</td>";
    //     dynamichtml += "<td>" + (members[i].married == true ? "Married" : "celiataire") + "</td></tr>";
    // }
    // document.getElementById("tblbody").innerHTML = dynamichtml;
    document.getElementById("tblbody").innerHTML = "";
    let oRow;
    let sAge = 0;
    for (let i = 0; i < members.length; i++) {
        //Creation du TR
        oRow = document.createElement('tr');
        // //creation du row
        // oCell = document.createElement('td');
        // oCell.textContent = members[i].fname;
        // oRow.appendChild(oCell);
        // //2 cell
        // oCell = document.createElement('td');
        // oCell.textContent = members[i].age;
        // oRow.appendChild(oCell);
        // //3 cell
        // oCell = document.createElement('td');
        // oCell.textContent = members[i].married ? members[i].sex == 'F' ? "Marièe" : "Mariè" : "celibataire";
        // oRow.appendChild(oCell);
        fnAdd('td', members[i].fname, oRow, false);
        fnAdd('td', members[i].age, oRow, true);
        sAge += members[i].age;
        const isMarie = members[i].married ? members[i].sex == 'F' ? "Marièe" : "Mariè" : "celibataire";
        fnAdd('td', isMarie, oRow, false);
        // append to the table
        document.getElementById("tblbody").appendChild(oRow);
    }
    let avgAge = sAge / members.length;
    document.getElementById("avgAge").innerText = (avgAge).toFixed(2);
}

const fnAdd = (elem, text, parentElem, isEditable) => {
    const childElement = document.createElement(elem);
    childElement.textContent = text;
    childElement.contentEditable = isEditable;
    parentElem.appendChild(childElement);
}


window.addEventListener(
    'load',
    function () {
        fnDisplay();
    }, false
)