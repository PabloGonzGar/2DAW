const btnBorrar = document.querySelectorAll("#btnBorrar");


for(let btnBorrarParticular of btnBorrar){
    btnBorrarParticular.addEventListener("click", () => {

        const fila = btnBorrarParticular.parentNode;
        console.log(fila)
        fila.setAttribute("hidden", "true")
    })

}