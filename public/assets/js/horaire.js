document.getElementById('horaireForm').addEventListener('submit', function(event) {
    // Empêche l'envoi automatique du formulaire
    event.preventDefault();

    // Récupère les éléments des heures
    const heureOuverture = document.getElementById('heure_ouverture');
    const heureFermeture = document.getElementById('heure_fermeture');

    // Vérifie si les champs sont vides, et les met à null si c'est le cas
    if (heureOuverture.value === '00:00:00') {
        heureOuverture.value = null;  // Définir null si pas rempli
    }

    if (heureFermeture.value === '00:00:00') {
        heureFermeture.value = null;  // Définir null si pas rempli
    }

    // Soumettre manuellement le formulaire après avoir modifié les valeurs
    this.submit();
});