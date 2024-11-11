// Load HTML

function loadHTML(elementId, filePath) {
    return fetch(filePath)
        .then(response => {
            if (!response.ok) {
                throw new Error('Erreur de chargement du fichier : ' + response.status)
            }
            return response.text()
        })
        .then(data => {
            document.getElementById(elementId).innerHTML = data
        })
        .catch(error => {
            console.error('Erreur:', error)
        });
}


Promise.all([
    loadHTML('header', '/public/html/header-footer/header.html'),
    loadHTML('footer', '/public/html/header-footer/footer.html')
]).then(() => {

    const event = new Event("dataLoaded")
    window.dispatchEvent(event)
});

// Load JS

function loadScript(adress) {
    const script = document.createElement("script")
    script.src = adress
    script.defer = true
    document.body.appendChild(script)
}

window.addEventListener("dataLoaded", () => {
    loadScript("/public/js/main/scrollbar.js")
    loadScript("/public/js/main/connexion.js")
    loadScript("/public/js/main/burgermenu.js")
});
