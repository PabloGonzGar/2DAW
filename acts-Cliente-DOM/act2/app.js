const myTable = document.createElement("table");
myTable.setAttribute("border","1")

let contador = 1;
for(let i = 1 ; i <= 10 ; i++){
    let myRow = document.createElement("tr");
    for(let j = 1 ; j <= 10 ; j++){
        let myColumn = document.createElement("td");
        myColumn.innerText = contador;
        myRow.appendChild(myColumn);
        contador++;
    }

    myTable.appendChild(myRow)

}
document.body.appendChild(myTable)


const btnPrimos = document.querySelector("#btnCalc")
const btnReset = document.querySelector("#btnRes")

btnPrimos.addEventListener("click", function(){
    for(let rows of myTable.querySelectorAll("tr")){
        console.log(rows)
        for(let columns of rows.querySelectorAll("td")){
            let contadorPrimos = 0;
            for(let k = 1 ; k <= columns.innerText ; k++){
                if(columns.innerText%k === 0){
                    contadorPrimos++
                }
            }
            if(contadorPrimos===2){
                columns.setAttribute("bgcolor","yellow")
            }

        }
    }
})

btnReset.addEventListener("click", function(){
    for(let rows of myTable.querySelectorAll("tr")){
        console.log(rows)
        for(let columns of rows.querySelectorAll("td")){
            
            columns.removeAttribute("bgcolor");

        }
    }
})