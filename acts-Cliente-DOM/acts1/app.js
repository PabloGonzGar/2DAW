"use strict"


function act1() {
    let number = prompt("Introduce a number");

    for (let i = 1; i <= number; i++) {
        let outNumber = Math.floor(Math.random() * 11);
        let output = document.createElement("p");
        output.innerText = outNumber;
        document.body.appendChild(output);
    }

}

//act1()

function act2() {
    let number = prompt("Introduce a number");

    for (let i = 1; i <= number; i++) {
        let outNumber = Math.floor(Math.random() * 11);
        let output = document.createElement("p");
        output.innerHTML = `<b>Pablo</b>  ${outNumber}`;
        document.body.appendChild(output);
    }
}
function act3() {
    
    let number = prompt("Introduce a number");
    const ulList = document.createElement("ul")

    for (let i = 1; i <= number; i++) {
        let outNumber = Math.floor(Math.random() * 11);
        const liList = document.createElement("li");
        liList.innerText = i +"- "+outNumber;
        ulList.insertAdjacentElement("afterbegin",liList);
    }

    document.body.append(ulList)
}


act3()

