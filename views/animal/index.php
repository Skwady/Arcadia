<?php 
$link = '/assets/css/list.css';
$title = 'Animaux';

usort($Animals, function($a, $b) {
  return $a->id_habitat <=> $b->id_habitat;
});
?>

<h1 class="text-center mt-3 mb-3"><strong>Les animaux d' Arcadia</strong></h1>

<div class="container">
  <div class="row">
    <?php foreach($Animals as $Animal): ?>
      <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 d-flex ">
        <div class="card w-100">
          <a href="/animal/lire/<?= $Animal->id ?>" class="text-decoration-none" data-animal-id="<?= $Animal->id ?>">
            <img src="<?= $Animal->slug ?>" alt="<?= $Animal->name ?>" class="card-img-top">
          </a>
          <div class="card-body text-center">
            <h2 class="h5">
              <?= $Animal->name ?>
            </h2>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?php $script = '/assets/js/compteur.js' ?>