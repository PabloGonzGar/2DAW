const p1 = document.createElement("p")
const p2 = document.createElement("p")
const p3 = document.createElement("p")

const btnRestart = document.querySelector("#restart")

p1.innerText = "Pablo Segundo"
p2.innerText = "Gonzalez"
p3.innerText = "Garcia"


document.body.append(p1)
document.body.append(p2)
document.body.append(p3)

p1.addEventListener("mouseout",()=>{
    p1.hidden= true
})
p2.addEventListener("mouseout",()=>{
    p2.hidden= true
})
p3.addEventListener("mouseout",()=>{
    p3.hidden= true
})


btnRestart.addEventListener("click",()=>{
    const myPs = document.querySelectorAll("p")
    for(let p of myPs){
        p.hidden = false
    }
})

p1.addEventListener("dblclick",()=>{
    p1.remove()
})

p2.addEventListener("dblclick",()=>{
    p2.remove()
})

p3.addEventListener("dblclick",()=>{
    p3.remove()
})