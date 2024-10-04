document.addEventListener('DOMContentLoaded', function() {
    const animalLinks = document.querySelectorAll('.animal-link');

    animalLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Empêche la redirection immédiate vers la page de l'animal

            const animalId = this.getAttribute('data-animal-id');

            // Requête AJAX pour incrémenter les visites
            fetch('/animal/incrementVisits', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id: animalId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Redirection vers la page de l'animal après l'incrémentation
                    window.location.href = this.href;
                } else {
                    console.error('Erreur lors de l\'incrémentation : ' + data.message);
                }
            })
            .catch(error => console.error('Erreur:', error));
        });
    });
});