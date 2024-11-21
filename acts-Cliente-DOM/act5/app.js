const p = document.createElement("p")

const positions = (event)=>{
    const positions = `${event.clientX}x : ${event.clientY}y`
    p.innerText = positions;
}

window.addEventListener("mousemove",positions)
document.body.append(p)
