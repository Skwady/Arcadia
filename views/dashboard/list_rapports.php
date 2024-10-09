<div class="container">
    <h2 class="text-center">Liste des Rapports</h2>

    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    <div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th onclick="sortTable(0, 'string')">
                    Titre <i class="fas fa-sort" id="sort-icon-0"></i>
                </th>
                <th onclick="sortTable(1, 'date')">
                    Date <i class="fas fa-sort" id="sort-icon-1"></i>
                </th>
                <th>État de santé</th>
                <th>Commentaire sur l'habitat</th>
                <th onclick="sortTable(4, 'string')">
                    Animal <i class="fas fa-sort" id="sort-icon-4"></i>
                </th>
                <th>Utilisateur</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="rapportTable">
            <?php foreach ($rapports as $rapport): ?>
                <tr>
                    <td><?= $rapport->name ?></td>
                    <td><?= $rapport->dates ?></td>
                    <td><?= $rapport->states ?></td>
                    <td><?= $rapport->commentaire ?></td>
                    <td><?= $rapport->animal_name ?></td>
                    <td><?= $rapport->user_name ?></td>
                    <td>
                        <a href="/rapportDashboard/editRapport/<?= $rapport->id ?>" class="btn btn-warning">Modifier</a>
                        <a href="/rapportDashboard/viewRapport/<?= $rapport->id ?>" class="btn btn-success">détail</a>
                        <a href="/rapportDashboard/deleteRapport/<?= $rapport->id ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce rapport ?')">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    <a href="/rapportDashboard/addRapport" class="btn btn-success">Ajouter un Nouveau Rapport</a>
</div>
<?php $script = '/assets/js/filter.js' ?>