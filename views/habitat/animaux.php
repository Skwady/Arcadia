<?php 
$link = '/assets/css/list.css'; 
$title = 'Animaux';
?>
<h2 class="text-center mt-3 mb-3"><strong><?= $habitat->name ?></strong></h2>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card h-100">
                <div class="card-body">
                    <h4 class="card-text p-2"><?= $habitat->description ?></h4>
                </div>
            </div>
        </div>
    </div>
</div>

<h2 class="text-center mt-3 mb-3">Animaux de <?= $habitat->name ?></h2>
<div class="container">
    <div class="row justify-content-center align-items-center">
        <?php if (!empty($animaux)): ?>
            <?php foreach($animaux as $animal): ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 d-flex">
                    <div class="card m-auto">
                        <a href="/animal/lire/<?= $animal->id ?>" class="text-decoration-none">
                            <img src="<?= $animal->slug ?>" alt="<?= $animal->name ?>" class="card-img-top">
                        </a>
                        <div class="card-body text-center">
                            <h2 class="h5"><?= $animal->name ?></h2>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center">Aucun animal trouvé pour cet habitat.</p>
        <?php endif; ?>
    </div>
</div>
