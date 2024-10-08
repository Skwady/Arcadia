<?php
$link = '/assets/css/list.css';
$title = 'Animaux';
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img src="<?= $id->slug ?>" class="img-fluid rounded-start" alt="Image de l'animal">
        </div>
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-body">
                    <h2 class="card-title text-center"><strong><?= $id->name ?></strong></h2>
                    <h4 class="card-text p-2"><strong>Âge : </strong><?= $id->age ?> ans</h4>
                    <h4 class="card-text p-2"><strong>Habitat : </strong><?= $id->habitat ?></h4>
                    <h4 class="card-text p-2"><strong>Race : </strong><?= $id->race ?></h4>
                    <h4 class="card-text p-2"><?= $id->description ?></h4>
                    <h4 class="card-text p-2"><strong>Le Saviez-vous : </strong><?= $id->dyk ?></h4>
                    <h4 class="card-text p-2"><strong>Avis Vétérinaire : </strong><?= $id->commentaire ?></h4>
                </div>
            </div>
        </div>
    </div>
</div>