<div class="container">
    <h2 class="text-center">Liste des Services</h2>
    <div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Image</th>
                <th>Description</th>
                <th>Ajouté par</th>
                <?php if (isset($_SESSION['role']) && ($_SESSION['role'] === 'Admin' || $_SESSION['role'] === 'Employe')): ?>
                <th>Actions</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($services as $service): ?>
                <tr>
                    <td><?= $service->name ?></td>
                    <td>
                        <img src="<?= $service->slug ?>" alt="<?= $service->name ?>" class="img-thumbnail" style="max-width: 100px; max-height: 100px;">
                    </td>
                    <td><?= $service->description ?></td>
                    <td><?= $service->user_name ?></td> 
                    <?php if (isset($_SESSION['role']) && ($_SESSION['role'] === 'Admin' || $_SESSION['role'] === 'Employe')): ?>
                    <td>
                        <a href="/serviceDashboard/editService/<?= $service->id ?>" class="btn btn-warning">Modifier</a>
                        <a href="/serviceDashboard/deleteService/<?= $service->id ?>" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer ce service ?');">Supprimer</a>
                    </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</div>
