const paper = document.querySelector("#paper")
const bin = document.querySelector("#emptyBin")

emptyBin.addEventListener("dragover", (e) => {
    e.preventDefault()
})

emptyBin.addEventListener("drop", (e) => {
    e.preventDefault()
    paper.style.setProperty("display","none")
    bin.setAttribute("src","img/iconoir--bin-full.png") 
})

const button = document.querySelector("button")

button.addEventListener("click", (e) => {
    paper.style.setProperty("display", "block")
    bin.setAttribute("src","img/akar-icons--trash-bin.png") 
})
