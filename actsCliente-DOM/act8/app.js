window.addEventListener("dblclick",() => {
    let randomColorR = Math.floor(Math.random()*256)
    let randomColorG = Math.floor(Math.random()*256)
    let randomColorB = Math.floor(Math.random()*256)

    let color = `rgb(${randomColorR},${randomColorG},${randomColorB})`
    document.body.style.setProperty("background-color",color)
})