<div class="container"> 
    <h1 class="text-center">Liste des Horaires</h1>
    <div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Déscription</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($horaires)): ?>
                <?php foreach ($horaires as $horaire): ?>
                    <tr>
                        <td><?= $horaire->horaire ?></td>
                        <td>
                            <a href="/horaireDashboard/editHoraire/<?= $horaire->id ?>" class="btn btn-warning btn-sm">Modifier</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">Aucun horaire disponible.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    </div>
</div>