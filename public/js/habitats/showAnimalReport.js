const animalBtns = document.querySelectorAll(".showDisplay")

animalBtns.forEach(btn => {
    btn.addEventListener("click", () => {

            btn.nextElementSibling.classList.add("active")
    
    btn.style.display = "none"
})
});
