<div class="container">
    <h1 class="mt-4 text-center">Liste des avis</h1>
    <?php if (empty($avis)): ?>
        <div class="alert alert-info" role="alert">
            Aucun avis trouvé.
        </div>
        <?php else: ?>
            <?php
        // Trier les avis pour afficher ceux qui ne sont pas visibles en premier
        usort($avis, function ($a, $b) {
            return $a->isVisible - $b->isVisible; // Affiche les avis non visibles en premier
        });
        ?>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Pseudo</th>
                    <th>Commentaire</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($avis as $a): ?>
                    <tr>
                        <td><?= $a->pseudo ?></td>
                        <td class="commentaire"><?= $a->commentaire ?></td>
                        <td><?= $a->isVisible ? 'Visible' : 'Non visible' ?></td>
                        <td>
                            <?php if (!$a->isVisible): ?>
                                <form action="/avisDashboard/authorizeAvis/<?= $a->_id ?>" method="POST" class="d-inline">
                                    <input type="hidden" name="id" value="<?= $a->_id ?>">
                                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                                    <button type="submit" class="btn btn-success btn-sm">Autoriser</button>
                                </form>
                            <?php endif; ?>

                            <form action="/avisDashboard/deleteAvis/<?= $a->_id ?>" method="POST" class="d-inline">
                                <input type="hidden" name="id" value="<?= $a->_id ?>">
                                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet avis ?');">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php endif; ?>
</div>