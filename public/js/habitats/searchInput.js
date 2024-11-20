document.getElementById("searchInput").addEventListener("input", function () {
    let searchValue = this.value.toLowerCase(); 
    const cards = document.querySelectorAll(".animalCard"); 

    cards.forEach(card => {
        const animalName = card.getAttribute("data-name").toLowerCase(); 
        if (animalName.includes(searchValue)) {
            card.style.display = "block"; 
        } else {
            card.style.display = "none"; 
        }
    });
});