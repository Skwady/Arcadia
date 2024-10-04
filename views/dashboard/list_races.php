<div class="container">
    <h2 class="text-center">Liste des Espèce</h2>
    
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    <div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom de l'espèce</th>
                <?php if(isset($_SESSION['role']) && ($_SESSION['role'] === 'Admin' || $_SESSION['role'] === 'Employe')): ?>
                <th>Actions</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($races as $race): ?>
                <tr>
                    <td><?= $race->race ?></td>
                    <?php if(isset($_SESSION['role']) && ($_SESSION['role'] === 'Admin' || $_SESSION['role'] === 'Employe')): ?>
                    <td>
                        <a href="/raceDashboard/editRace/<?= $race->id ?>" class="btn btn-warning btn-sm">Modifier</a>
                        <a href="/raceDashboard/deleteRace/<?= $race->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette race ?');">Supprimer</a>
                    </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</div>