<div class="container">
    <h2 class="text-center">Liste des Événements</h2>
    <div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($evenements as $e): ?>
                <tr>
                    <td><?= $e->description ?></td>
                    <td>
                        <a href="/evenementDashboard/showEvenement/<?= $e->_id ?>" class="btn btn-warning btn-sm">Modifier</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</div>
