
window.addEventListener("keyup", (e) => {
    //console.log(e.key)
    let isLetter = /[A-Z]/gi
    if(isLetter.test(e.key)){
        const myUl = document.createElement("ul")

        let arrayLettersDNI = ['T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E']
        for (let i = 1 ; i<= 9999 ; i++){
            let position = arrayLettersDNI[i%23]
            console.log(position)
            if(position === e.key.toUpperCase()){
                const myLi = document.createElement("li")
                myLi.innerText = `${i}${position}`
                myUl.appendChild(myLi)
            }
        }
        document.body.append(myUl)
    }
})