<?php 
$link = '/assets/css/list.css'; 
$title = 'Habitat';
?>

<h1 class="text-center mb-3 mt-3"><strong>Les habitats d' Arcadia</strong></h1>

<div class="container">
  <div class="row">
    <?php foreach ($habitats as $habitat): ?>
      <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 d-flex">
        <a href="/habitat/afficherAnimaux/<?= $habitat->id ?>" class="text-decoration-none w-100">
          <div class="card">
            <img src="<?= $habitat->slug ?>" alt="<?= $habitat->name ?>" class="card-img-top object-position-top">
            <div class="card-body text-center">
              <h2 class="h5"><?= $habitat->name ?></h2>
            </div>
          </div>
        </a>
      </div>
    <?php endforeach; ?>
  </div>
</div>