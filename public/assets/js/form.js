const commentaireInput = document.getElementById('commentaire');
const charCount = document.getElementById('charCount');

commentaireInput.addEventListener('input', function() {
    const currentLength = commentaireInput.value.length;
    charCount.textContent = `${currentLength}/700 caractères`;
});

function toggleText(button) {
    let target = button.getAttribute("data-target");
    let dots = document.getElementById("dots" + target);
    let moreText = document.getElementById("more" + target);
    let btnText = button;

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