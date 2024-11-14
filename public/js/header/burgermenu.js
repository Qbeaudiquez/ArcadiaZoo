const burgerMenu = document.querySelector(".burger-menu")
let isOpen = false

burgerMenu.addEventListener("click", () => {
    const navBar = document.querySelector(".navbar")
    const imgBurgerMenu = document.querySelector(".imgBurgerMenu")
    if(!isOpen){
        navBar.style.left = "0%"
        isOpen = true
        imgBurgerMenu.src = "/zoo-arcadia/asset/icon/x.svg"
    }else{
        navBar.style.left = "100%"
        isOpen = false
        imgBurgerMenu.src = "/asset/icon/menu.svg"
        connexionContainer.classList.remove("active")
    }
    
})

