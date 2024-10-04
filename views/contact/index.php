<?php
$link = '/assets/css/dashboard.css';
$links = '/assets/css/contact.css';
$title = 'Contact';
?>
<div class="mt-7">
  <h3 class="title text-center mb-3 mt-3">Planifiez votre visite au zoo : consultez nos horaires d'ouverture !</h3>
</div>

<div class="leaves container mt-4">
  <h3 class="text-center pad"><strong><?= $horaires->horaire ?></strong></h3>
</div>

<div class="container mt-7 p-2 d-flex flex-wrap">
  <div>
    <ul class="mx-5">
      <h3>Coordonnées de Contact</h3>
      <li><h4>Adresse Postale :</h4><p>Zoo Arcadia route de brocéliande 35380 Paimpont</p></li>
      <li><h4>Numéro de Téléphone :</h4><p>01.02.03.04.05</p></li>
      <li><h4>Adresse E-mail :</h4><p>contact.arcadia@gmail.com</p></li>
    </ul>
  </div>
  <div class="align-items-center d-flex icon">
    <i class="fa-brands fa-facebook icons"></i>
    <i class="fa-brands fa-instagram icons"></i>
    <i class="fa-brands fa-youtube icons"></i>
    <i class="fa-brands fa-linkedin icons"></i>
    <i class="fa-brands fa-x-twitter icons"></i>
  </div>
</div>



<div class="container text-center mt-7">
  <h2 class="title"><strong>Tarifs et billetteries</strong></h2>
</div>

<div class="container-fluid mt-5">
  <div class="row d-flex justify-content-center text-center g-4">
    <!-- Section 1 -->
    <div class="col-sm-6 col-lg-3 d-flex p-0">
      <div class="content-wrapper d-flex flex-column justify-content-between align-items-center flex-grow-1 p-3" style="height: 500px;">
        <img class="w-75 mb-3" src="/assets/img/Pass.png" alt="soigneur">
        <h3 class="title mb-4">Pass une journée</h3>
        <button onclick="toggleText(this)" id="myBtn1" data-target="1" class="btn btn-secondary mt-3">Lire la suite</button>
        <div class="text-container text-center" id="text1">
          <span id="dots1">...</span>
          <span id="more1" class="more-text">
            <strong>
              Gratuit pour les enfants de moins de 3 ans
              <br>Enfants (3 à 12 ans) : 25€
              <br>Adultes : 35€
            </strong>
          </span>
        </div>
      </div>
    </div>

    <!-- Section 2 -->
    <div class="col-sm-6 col-lg-3 d-flex p-0">
      <div class="content-wrapper d-flex flex-column justify-content-between align-items-center flex-grow-1 p-3" style="height: 500px;">
        <img class="w-75 mb-3" src="/assets/img/Pass-2.png" alt="aigle">
        <h3 class="title mb-4">Pass deux jours</h3>
        <button onclick="toggleText(this)" id="myBtn2" data-target="2" class="btn btn-secondary mt-3">Lire la suite</button>
        <div class="text-container text-center" id="text2">
          <span id="dots2">...</span>
          <span id="more2" class="more-text">
            <strong>
              Gratuit pour les enfants de moins de 3 ans
              <br>Enfants (3 à 12 ans) : 40€
              <br>Adultes : 60€
            </strong>
          </span>
        </div>
      </div>
    </div>

    <!-- Section 3 -->
    <div class="col-sm-6 col-lg-3 d-flex p-0">
      <div class="content-wrapper d-flex flex-column justify-content-between align-items-center flex-grow-1 p-3" style="height: 500px;">
        <img class="w-75 mb-3" src="/assets/img/Pass-3.png" alt="otarie">
        <h3 class="title mb-4">Pass familial</h3>
        <button onclick="toggleText(this)" id="myBtn3" data-target="3" class="btn btn-secondary mt-3">Lire la suite</button>
        <div class="text-container text-center" id="text3">
          <span id="dots3">...</span>
          <span id="more3" class="more-text">
            <strong>
              2 adultes + 3 enfants de plus de 3 ans
              <br>Gratuit pour les enfants de moins de 3 ans 
              <br>Enfants (3 à 12 ans) : 15€
              <br>Adultes : 25€
            </strong>
          </span>
        </div>
      </div>
    </div>

    <!-- Section 4 -->
    <div class="col-sm-6 col-lg-3 d-flex p-0">
      <div class="content-wrapper d-flex flex-column justify-content-between align-items-center flex-grow-1 p-3" style="height: 500px;">
        <img class="w-75 mb-3" src="/assets/img/Pass-4.png" alt="image supplémentaire">
        <h3 class="title mb-4">Pass annuel</h3>
        <button onclick="toggleText(this)" id="myBtn4" data-target="4" class="btn btn-secondary mt-3">Lire la suite</button>
        <div class="text-container text-center" id="text4">
          <span id="dots4">...</span>
          <span id="more4" class="more-text">
            <strong>
              Gratuit pour les enfants de moins de 3 ans
              <br>Enfants : 120€
              <br>Adultes : 180€
              <br><br>Pour les détenteurs du pass annuel :
              <br>Réductions sur la boutique du zoo, les restaurants.
              <br>Accès prioritaire, pour éviter les files d'attente.
              <br>Invitations à des événements exclusifs.
            </strong>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container text-center mt-12">
  <h4 class="">
    <strong>
      Pour votre confort, notre zoo est équipé de nombreuses installations pratiques, assurant une expérience agréable pour tous nos visiteurs ! Espace famille , personnes en situation de handicap ...
      <br><br>Espace Famille et Bébé :<br> Un espace famille est à votre disposition, avec des toilettes équipées de tables à langer pour les bébés, ainsi qu’un espace micro-ondes pour réchauffer les biberons et petits plats de vos enfants. Pour plus de confort, des poussettes sont disponibles à la location pour les plus petits.
      <br><br>Personnes en Situation de Handicap et Mobilité Réduite :<br> Le zoo est entièrement accessible aux personnes à mobilité réduite, incluant tous les restaurants sur place. Un grand parking est disponible pour tous les visiteurs, avec des places réservées aux personnes en fauteuil roulant. Nous proposons également la location de scooters électriques pour personnes à mobilité réduite, au tarif de 30 euros avec une caution de 200 euros ( sur réservation et sous réserve de disponibilité ).
      <br><br>Accessibilité pour les Malvoyants :<br> Le zoo est équipé de tablettes à empreintes en braille, installées devant chaque habitat et chaque restaurant, permettant aux visiteurs malvoyants et non-voyants de découvrir tactilement les espèces et les différentes installations , afin de garantir une qualité optimale de la visite pour tous.
      Toutes ces installations sont pensées pour faire de votre visite un moment inoubliable, adapté à tous les besoins, dans un cadre agréable et accessible.
    </strong>
  </h4>
</div>

<div class="container text-center mt-12">
  <h2 class="title"><strong> Plan du Zoo d'Arcadia : Votre carte pour explorer un monde de merveilles animales !</strong></h2>
</div>

<div class="mt-5 h-75 w-100 d-flex justify-content-center">
  <img class="w-50" src="/assets/img/plan.webp" alt="plan du zoo">
</div>

<div class="container text-center mt-12">
  <h2 class="title"><strong>Plan d'accès</strong></h2>
</div>

<div class="d-flex justify-content-center mt-5 mb-5">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d575801.5895410494!2d-2.3346835613234513!3d47.90166604585563!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x480fada9e6294e23%3A0x39f96d6720f975ba!2sArcadia!5e0!3m2!1sfr!2sfr!4v1727895058980!5m2!1sfr!2sfr" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

<div class="container mt-7 p-3 mb-5">

  <div class="w-100 d-flex justify-content-center">
    <?php if (isset($_SESSION['error_message'])) : ?>
      <div class="alert alert-danger text-center"><?= $_SESSION['error_message'] ?></div>
    <?php endif; ?>
    <?php if (isset($_SESSION['success_message'])) : ?>
      <div class="alert alert-success text-center"><?= $_SESSION['success_message'] ?></div>
    <?php endif; ?>
  </div>

  <h2 class="text-center mb-4">Contactez-nous</h2>
  <form action="/contact/index" method="POST" class="w-50 mx-auto">
    <div class="mb-3">
      <label for="name" class="form-label">Nom</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">E-mail</label>
      <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
      <label for="message" class="form-label">Message</label>
      <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
    </div>
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
    <button type="submit" class="btn btn-primary">Envoyer</button>
  </form>
</div>

<script src="/assets/js/form.js"></script>