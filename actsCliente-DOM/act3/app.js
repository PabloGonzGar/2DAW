
const btnMarcar = document.querySelector("#btnMarcar")
const btnDesmarcar = document.querySelector("#btnDesmarcar")
const btnPares = document.querySelector("#pares")
const btnImpares = document.querySelector("#impares")
const btnrestPares = document.querySelector("#restpares")
const btnrestImpares = document.querySelector("#restimpares")

for(let i = 0 ; i < 100 ; i++){

    const myInput = document.createElement("input")

    myInput.setAttribute("type","checkbox")
    let randNumber = Math.floor(Math.random()*100+100)
    myInput.setAttribute("value",randNumber)
    myInput.setAttribute("id", i)

    const myLabel = document.createElement("label")
    myLabel.setAttribute("for",i)
    myLabel.innerText = `${i} (value = ${myInput.value})`

    const br = document.createElement("br")

    document.body.append(br)
    document.body.appendChild(myInput)
    document.body.appendChild(myLabel)


    myInput.addEventListener("click" ,function(){
        
        if(myInput.checked){
            console.log(`checkbox ${myInput.value} marcado`)
        }else{
            console.log(`checkbox ${myInput.value} desmarcado`)
        }
    })
}

btnMarcar.addEventListener("click", function(){
    const allCheckBox = document.querySelectorAll('input[type="checkbox"]')
    for(let checkbox of allCheckBox){
        checkbox.checked = true
    }
})

btnDesmarcar.addEventListener("click", function(){
    const allCheckBox = document.querySelectorAll('input[type="checkbox"]')
    for(let checkbox of allCheckBox){
        checkbox.checked = false
    }
})

btnPares.addEventListener("click", function(){
    const allCheckBox = document.querySelectorAll('input[type="checkbox"]')
    for(let checkbox of allCheckBox){
        checkbox.checked = false
        if((checkbox.value%2) === 0){
            checkbox.style.setProperty("transform","scale(1.5)")
        }
    }
})



btnImpares.addEventListener("click", () =>{
    const allCheckBox = document.querySelectorAll('input[type="checkbox"]')
    for(let checkbox of allCheckBox){
        checkbox.checked = false
        if((checkbox.value%2) !==0){
            checkbox.style.setProperty("transform","scale(1.5)")
        }
    }
})
btnrestPares.addEventListener("click", function(){
    const allCheckBox = document.querySelectorAll('input[type="checkbox"]')
    for(let checkbox of allCheckBox){
        checkbox.checked = false
        if((checkbox.value%2) === 0){
            checkbox.style.setProperty("transform","scale(1)")
        }
    }
})



btnrestImpares.addEventListener("click", () =>{
    const allCheckBox = document.querySelectorAll('input[type="checkbox"]')
    for(let checkbox of allCheckBox){
        checkbox.checked = false
        if((checkbox.value%2) !==0){
            checkbox.style.setProperty("transform","scale(1)")
        }
    }
})


