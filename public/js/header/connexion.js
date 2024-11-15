// Select element
const connexionContainer = document.querySelector(".connexionContainer")

const connexionBtn = document.querySelector(".connexionBtn")

// Log-in button
connexionBtn.addEventListener("click", () => {
    connexionContainer.classList.toggle("active")
})