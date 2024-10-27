function loadHTML(elementId, filePath) {
    fetch(filePath)
        .then(response => {
            if (!response.ok) {
                throw new Error('Erreur de chargement du fichier : ' + response.status);
            }
            return response.text();
        })
        .then(data => {
            document.getElementById(elementId).innerHTML = data;
        })
        .catch(error => {
            console.error('Erreur:', error);
        });
}
    loadHTML('header', 'header.html');
    loadHTML('footer', 'footer.html');
    
