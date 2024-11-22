const btnStart = document.createElement("button")
const btnEnd = document.createElement("button")
btnStart.innerText ="Comenzar Saludos"
btnEnd.innerText ="Parar Saludos"

let myInterval 

document.body.append(btnStart)
document.body.append(btnEnd)

btnStart.addEventListener("click",() => {
    myInterval= setInterval(()=>{
        alert("hola")
    }, 5000)
})


btnEnd.addEventListener("click",() => {
    clearInterval(myInterval)
    myInterval = null
})