<div class="container">
    <h2 class="text-center">Liste des Habitats</h2>
    <div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Image</th>
                <th>Description</th>
                <?php if(isset($_SESSION['role']) && ($_SESSION['role'] === 'Admin' || $_SESSION['role'] === 'Employe')): ?>
                <th>Actions</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($habitats as $habitat): ?>
                <tr>
                    <td><?= $habitat->name ?></td>
                    <td>
                        <img src="<?= $habitat->slug ?>" alt="<?= $habitat->name ?>" class="w100 h100">
                    </td>
                    <td><?= $habitat->description ?></td>
                    <?php if(isset($_SESSION['role']) && ($_SESSION['role'] === 'Admin' || $_SESSION['role'] === 'Employe')): ?>
                    <td>
                        <a href="/habitatDashboard/editHabitat/<?= $habitat->id ?>" class="btn btn-warning btn-sm">Modifier</a>
                        <a href="/habitatDashboard/deleteHabitat/<?= $habitat->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer cet habitat ?');">Supprimer</a>
                    </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</div>