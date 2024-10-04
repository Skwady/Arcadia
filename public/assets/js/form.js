const form = document.getElementById('avisForm');
const toggleButton = document.getElementById('toggleFormButton');

toggleButton.addEventListener('click', function() {
    if (form.style.display === 'none') {
        form.style.display = 'block'; // Montre le formulaire
        toggleButton.textContent = 'Fermer le formulaire'; // Change le texte du bouton
    } else {
        form.style.display = 'none'; // Cache le formulaire
        toggleButton.textContent = 'Ajouter un avis'; // Change le texte du bouton
    }
});


const commentaireInput = document.getElementById('commentaire');
const charCount = document.getElementById('charCount');

commentaireInput.addEventListener('input', function() {
    const currentLength = commentaireInput.value.length;
    charCount.textContent = `${currentLength}/700 caractères`;
});

function toggleText(button) {
    const target = button.getAttribute("data-target");
    const dots = document.getElementById("dots" + target);
    const moreText = document.getElementById("more" + target);
    const btnText = button;

    if (dots.style.display === "none") {
        dots.style.display = "inline";
        btnText.innerHTML = "Lire la suite"; 
        moreText.style.display = "none";
    } else {
        dots.style.display = "none";
        btnText.innerHTML = "Lire moins"; 
        moreText.style.display = "inline";
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const video = document.getElementById('videoAC');

    // Fonction pour détecter si l'appareil est mobile
    function isMobile() {
        return /Android|webOS|iPhone|iPad|IEMobile|Opera Mini/i.test(navigator.userAgent);
    }

    if (!isMobile()) {
        // Sur desktop : autoplay
        video.autoplay = true;
        video.play().catch(function(error) {
            console.log("Autoplay was prevented:", error);
        });
    } else {
        // Sur mobile : en pause
        video.pause();
    }
});