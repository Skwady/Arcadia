<div class="container">
    <h2 class="text-center">Liste des Animaux</h2>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Espèce</th>
                    <th>Âge</th>
                    <th>Image</th>
                    <th>Habitat</th>
                    <?php if(isset($_SESSION['role']) && ($_SESSION['role'] === 'Admin' || $_SESSION['role'] === 'Employe')): ?>
                    <th>Visites</th>
                    <th>Actions</th>
                    <?php endif ?>
                </tr>
            </thead>
            <tbody>
                <?php 
                // Trier le tableau d'animaux par le nombre de visites de manière décroissante
                usort($animals, function($a, $b) {
                    return $b->visits - $a->visits; // Tri décroissant
                });
                
                // Boucle pour afficher chaque animal
                foreach ($animals as $animal): ?>
                    <tr>
                        <td><?= $animal->name ?></td>
                        <td><?= $animal->race_name ?></td>
                        <td><?= $animal->age ?></td>
                        <td>
                            <img class="w50" src="<?= $animal->slug ?>" alt="<?= $animal->name ?>">
                        </td>
                        <td><?= $animal->habitat_name ?></td>
                        <?php if(isset($_SESSION['role']) && ($_SESSION['role'] === 'Admin' || $_SESSION['role'] === 'Employe')): ?>
                        <td><?= $animal->visits ?></td>
                        <td>
                            <a href="/animalDashboard/editAnimal/<?= $animal->id ?>" class="btn btn-warning btn-sm">Modifier</a>
                            <a href="/animalDashboard/deleteAnimal/<?= $animal->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet animal ?');">Supprimer</a>
                        </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
