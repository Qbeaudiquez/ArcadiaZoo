// Select element
const connexionContainer = document.querySelector(".connexionContainer")

const connexionBtn = document.querySelector(".connexionBtn")

connexionBtn.addEventListener("click", () => {
    connexionContainer.classList.toggle("active")
})