<?php
$link = '/assets/css/dashboard.css';
$links = '/assets/css/main.css';
$title = 'Accueil';
?>

<section class="hero" id="home">
    <div class="video-container">
        <video id="videoAC" autoplay muted loop>
            <source src="/assets/img/lemurien.mp4" type="video/mp4">
            Votre navigateur ne supporte pas la lecture de vidéos.
        </video>
    </div>
</section>
<div>
    <h1 class="title text-center">Bienvenue à Arcadia</h1>
</div>

<div class="text-center">
    <img class="mt-4 w-75 mb-4" src="assets/img/porte.webp" alt="entrer du zoo">
</div>

<div class="container">
    <h5 id="description">
        <strong>Contexte et lieu d'implantation</strong><br><br>
        Situé au cœur de la Bretagne, à proximité de la légendaire forêt de Brocéliande, Arcadia bénéficie d'un cadre enchanteur et mystérieux, propice à la découverte de la nature. La forêt de Brocéliande, riche en mythes arthuriens, est non seulement un symbole historique et culturel de la région, mais également un écosystème dense et varié. Cet emplacement n'a pas été choisi par hasard : la proximité de la forêt permet une symbiose entre le zoo et l'environnement naturel, offrant un cadre idéal pour les espèces animales et végétales.<br><br>
        <span id="dots1">...</span>
        <span id="more1" style="display: none;">

            <strong>Histoire de la création</strong><br><br>

            La création du Zoo de Brocéliande a débuté en 1960, à l'initiative d'un passionné de nature et d'animaux, Jacques Delacourt. Ce biologiste et naturaliste breton rêvait de créer un sanctuaire où des espèces menacées pourraient être protégées et où le grand public pourrait découvrir la richesse de la faune mondiale. Avec un petit groupe de bénévoles et de scientifiques, il acquiert un terrain au bord de la forêt de Brocéliande, en harmonie avec les paysages naturels de la région.

            Les débuts du projet furent modestes : quelques enclos, des espaces verts soigneusement préservés, et une priorité donnée à l'accueil d'animaux en danger ou nécessitant des soins particuliers. Très vite, grâce à l'enthousiasme local et à l'implication des écologistes de toute la France, le zoo s'agrandit et est devenu un lieu incontournable pour les amoureux de la nature et les familles.<br><br>

            <strong>Soutien à l'écologie</strong><br><br>

            Dès ses débuts, Arcadia s'est engagé activement dans la protection de l'environnement. Conscient de l'importance des écosystèmes, il s'est doté d'une charte environnementale visant à limiter l'empreinte écologique des installations. L'eau, par exemple, est récupérée et recyclée à partir de sources naturelles proches. Arcadia collabore également avec des experts en botanique pour veiller à la préservation de la flore locale, en plantant des espèces endémiques et en maintenant des zones sauvages dans l'enceinte du parc.

            Chaque année, des programmes de reforestation sont mis en place, en partenariat avec les autorités locales et les associations environnementales bretonnes. Arcadia mène également une campagne de sensibilisation auprès de ses visiteurs sur les enjeux du réchauffement climatique et de la protection des habitats naturels.<br><br>

            <strong>Engagement dans la biodiversité</strong><br><br>

            L'un des piliers fondateurs du zoo est son engagement fort en faveur de la biodiversité. Il ne s'agit pas simplement d'un lieu de divertissement, mais d'un centre dédié à la protection et à la reproduction des espèces menacées. Parmi les nombreuses espèces que le zoo abrite, certaines sont en danger critique d'extinction. Arcadia travaille en collaboration avec d'autres parcs et centres de conservation à travers le monde pour participer à des programmes d'élevage et de réintroduction d'animaux dans la nature.

            Le zoo possède également un centre de recherche en biologie animale et en médecine vétérinaire, où des études sont menées sur les maladies et la génétique des espèces en captivité et à l'état sauvage. Chaque année, des dizaines de jeunes scientifiques viennent et effectuent des étapes ou des recherches, contribuant ainsi au développement des connaissances sur la biodiversité.<br><br>

            <strong>Activités éducatives et pédagogiques</strong><br><br>

            Arcadia est également un lieu d'apprentissage. Des programmes pédagogiques sont mis en place pour sensibiliser les jeunes générations à l'importance de la faune et de la flore. À travers des ateliers, des conférences et des visites guidées, le zoo tente de créer un lien fort entre ses visiteurs et la nature, dans le respect des animaux et des écosystèmes.

            Des expositions temporaires et permanentes permettent aussi de découvrir les liens étroits entre la mythologie de Brocéliande et le respect de la nature, renforçant l'idée que la culture et l'écologie sont indissociables.

            <br><br>

            Arcadia est plus qu'un simple parc animalier : c'est un sanctuaire vivant dédié à la protection de la faune et de la flore, un centre d'éducation et de recherche, et un exemple d'engagement environnemental. Depuis ses débuts modestes en 1960, il s'est développé pour devenir une référence en matière de conservation de la biodiversité, tout en offrant aux visiteurs une immersion unique au cœur de la nature bretonne et de la mythique forêt de Brocéliande.

    </h5>
    <button onclick="toggleText(this)" id="myBtn1" data-target="1" class="btn btn-primary mt-2">Lire la suite</button>
</div>

<img class="mt-4 w-100" src="assets/img/zoo_page.jpg" alt="animaux">

<div class="container mt-7 text-center">
    <h2 class="title"><strong>Moments magiques à Arcadia : Animations et spectacles pour toute la famille !</strong></h2>
</div>
<div class="row mx-auto justify-content-center w-100 mt-4">
    <div class="col-sm-12 col-md-6 col-lg-4 d-flex flex-column align-items-center">
        <a href="/service/#serv"><img class="bubbles img-fluid mx-5" src="/assets/img/soigneur_en_famille.jpg" alt="Premiers pas de soigneur"></a>
        <div class="container text-center mt-3 mb-3">
            <h3><strong>Premiers pas de soigneur</strong></h3>
            <h4>Réalisez votre rêve : devenez soigneur d'un jour et apprenez à prendre soin des animaux tout en vivant une aventure unique !</h4>
        </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-4 d-flex flex-column align-items-center">
        <a href="/service/#serv"><img class="bubbles img-fluid mx-5" src="/assets/img/spectacle_aigles_zoo.webp" alt="Spectacle"></a>
        <div class="container text-center mt-3 mb-3">
            <h3><strong>Les maîtres des airs</strong></h3>
            <h4>Laissez-vous émerveiller par la noblesse des aigles : un spectacle captivant qui vous plongera au cœur de la nature sauvage !</h4>
        </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-4 d-flex flex-column align-items-center">
        <a href="/service/#serv"><img class="bubbles img-fluid mx-5" src="/assets/img/spectacle_otarie.jpg" alt="lions de mer"></a>
        <div class="container text-center mt-3 mb-3">
            <h3><strong>L'Odyssée des lions de mer</strong></h3>
            <h4>Assistez à une danse majestueuse sous l'eau, nos lions de mer vous invitent à une aventure aquatique <br> époustouflante !</h4>
        </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-4 d-flex flex-column align-items-center">
        <img class="bubble img-fluid mx-5" src="/assets/img/voliere_3.webp" alt="la volière">
        <div class="container text-center mt-3 mb-3">
            <h3><strong>La volière d'Arcadia</strong></h3>
            <h4>Entrez dans un monde de couleurs et de mélodies : découvrez notre volière, où les oiseaux dansent et chantent en liberté !</h4>
        </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-4 d-flex flex-column align-items-center">
        <img class="bubble img-fluid mx-5" src="/assets/img/aquarium.webp" alt="aquarium">
        <div class="container text-center mt-3 mb-3">
            <h3><strong>L'aquarium d'Arcadia</strong></h3>
            <h4>Plongez au cœur des océans et laissez vous émerveiller par les secrets de la vie sous-marine dans l'aquarium d'Arcadia !</h4>
        </div>
    </div>
</div>

<div class="container mt-7 text-center">
    <h2 class="title"><strong>Venez à la rencontre des animaux et de leurs habitats : Voyage au cœur du zoo d'Arcadia !</strong></h2>
</div>

<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <!-- Premier Carousel -->
        <div class="col-12 col-lg-6 d-flex justify-content-center mb-4">
            <div class="carousel-container w-100">
                <div id="carousel1" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/assets/img/arctique_carousel.png" class="d-block" alt="Image 1a">
                        </div>
                        <div class="carousel-item">
                            <img src="/assets/img/etendues_desertiques_carousel.png" class="d-block" alt="Image 1b">
                        </div>
                        <div class="carousel-item">
                            <img src="/assets/img/foret_tropicale_carousel.png" class="d-block" alt="Image 1c">
                        </div>
                        <div class="carousel-item">
                            <img src="/assets/img/mangrove_carousel.png" class="d-block" alt="Image 1d">
                        </div>
                        <div class="carousel-item">
                            <img src="/assets/img/montagne_carousel.png" class="d-block" alt="Image 1e">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel1" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Précédent</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel1" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Suivant</span>
                    </button>
                </div>
                <div class="carousel-text">
                    <h5 class="bg-secondary">Venez explorer les merveilles de la nature au cœur d'Arcadia : un voyage fascinant à travers les habitats des animaux, où chaque coin dévoile un monde unique et enchanteur ! Préparez-vous à vivre des rencontres inoubliables avec la faune du monde entier !</h5>
                    <a href="/habitat" class="btn btn-secondary">En savoir plus -></a>
                </div>
            </div>
        </div>

        <!-- Deuxième Carousel -->
        <div class="col-12 col-lg-6 d-flex justify-content-center mb-4">
            <div class="carousel-container w-100">
                <div id="carousel2" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/assets/img/harfang_des_neiges_carousel.png" class="d-block" alt="Image 2a">
                        </div>
                        <div class="carousel-item">
                            <img src="/assets/img/fennec_carousel.png" class="d-block" alt="Image 2b">
                        </div>
                        <div class="carousel-item">
                            <img src="/assets/img/ara_bleu_carousel.png" class="d-block" alt="Image 2c">
                        </div>
                        <div class="carousel-item">
                            <img src="/assets/img/iguane_vert_carousel.png" class="d-block" alt="Image 2d">
                        </div>
                        <div class="carousel-item">
                            <img src="/assets/img/lynx_carousel.png" class="d-block" alt="Image 2e">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel2" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Précédent</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel2" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Suivant</span>
                    </button>
                </div>
                <div class="carousel-text">
                    <h5 class="bg-secondary">Venez vivre une expérience inoubliable à Arcadia ! Découvrez des animaux fascinants venus des quatre coins du globe : des majestueux félins aux mystérieux reptiles, en passant par des oiseaux exotiques et des primates espiègles !</h5>
                    <a href="/animal" class="btn btn-secondary">En savoir plus -></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container text-center mt-7">
    <h2 class="title"><strong> Mon Expérience au Zoo d'Arcadia : Votre avis compte !</strong></h2>
</div>

<div class="container bg-primary mt-4">
    <div id="avisCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
            $avisChunks = array_chunk($avis, 1);
            foreach ($avisChunks as $index => $avisGroup): ?>
                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                    <div class="row">
                        <?php foreach ($avisGroup as $a): ?>
                            <div class=".col-md-6 .offset-md-3">
                                <div class="card mb-4">
                                    <div class="card-body text-center h200">
                                        <h5 class="card-title"><?= $a->pseudo ?></h5>
                                        <p class="card-text px-5"><?= $a->commentaire ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <button class="justify-content-start carousel-control-prev" type="button" data-bs-target="#avisCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Précédent</span>
        </button>
        <button class="justify-content-end carousel-control-next" type="button" data-bs-target="#avisCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Suivant</span>
        </button>
    </div>
</div>
<div class="d-flex justifier-content-center">
    <button id="toggleFormButton" class="mx-auto btn btn-secondary text-center mb-4">Ajouter un avis</button>
</div>

<div id="avisForm" class="container mt-4" style="display: none;">
    <div class="container mt-5">
        <h2 class="mt-4 text-center">Ajouter un avis</h2>
        <form action="/" method="POST" class="mb-3">
            <div class="mb-3">
                <label for="pseudo" class="form-label">Pseudo:</label>
                <input type="text" id="pseudo" name="pseudo" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="commentaire" class="form-label">Commentaire:</label>
                <textarea id="commentaire" name="commentaire" class="form-control" rows="3" maxlength="700" required></textarea>
                <small id="charCount" class="form-text text-muted">0/700 caractères</small>
            </div>

            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
</div>

<?php $script = '/assets/js/form.js' ?>