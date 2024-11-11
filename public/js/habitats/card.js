if (window.innerWidth > 700) {
    const cards = document.querySelectorAll(".cardContainer")
    const animalsContainers = document.querySelectorAll(".animalsContainer")
    const descriptions = document.querySelectorAll(".descriptionAnimal")
    const animals = document.querySelectorAll(".animal")
    const crosses = document.querySelectorAll(".cross")

    cards.forEach((card) => {
        card.addEventListener("click", () => {
            card.style.cursor = "default"
            cards.forEach((c) => {
                c.classList.remove("active")
            })
            card.classList.add("active")
            card.nextElementSibling.classList.add("active")
            card.previousElementSibling.style.display = "block"
        }) 
    })

    animals.forEach((animal) => {
        animal.addEventListener("click", () => {
            if (animal.nextElementSibling.style.transform == "translateX(0px)") {
                animal.nextElementSibling.style.transform = "translateX(-100%)"
            } else {
                animal.nextElementSibling.style.transform = "translateX(0px)"
            }
        })
    })

    crosses.forEach((cross) => {
        cross.addEventListener("click", () => {
            cards.forEach((card) => {
                card.classList.add("active")
                card.nextElementSibling.classList.remove("active")
                cross.style.display = "none"
                card.style.cursor = "pointer"
                animals.forEach((animal) => {
                    animal.nextElementSibling.style.transform = "translateX(-100%)"
                })
            })
        })
    })
}
