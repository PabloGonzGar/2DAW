const myUl = document.querySelector("ul");
const btnAgregar = document.querySelector("#btnAgregar")
const btnBorrar = document.querySelector("#btnBorrar")


btnAgregar.addEventListener("click", function(){
    let number = Math.floor(Math.random()*101);
    let newLi = document.createElement("li");
    newLi.innerText = number;
    myUl.appendChild(newLi);
})

btnBorrar.addEventListener("click",function(){
    myUl.lastElementChild.remove()
})