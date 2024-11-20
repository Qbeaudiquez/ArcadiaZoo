document.addEventListener("DOMContentLoaded", function() {
    const buttons = document.querySelectorAll('.showDisplay');
    

    buttons.forEach(button => {
        button.addEventListener('click', function() {
            const animalId = this.getAttribute('data-animal-id');
            

                fetch("../../../src/moderateTargetValue.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded",
                    },
                    body: `animal_key=${encodeURIComponent(animalId)}`
                })
                    .then(response => response.text())
                    .then(result => {
                        console.log("Réponse du serveur :", result);
                    })
                    .catch(error => {
                        console.error("Erreur :", error);
            });
        });
    });
});


