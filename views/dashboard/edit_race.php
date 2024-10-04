<div class="container">
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form action="/raceDashboard/editRace/<?= $race->id ?>" method="POST">
        <div class="mb-3">
            <label for="race" class="form-label">Nom de l'espèce</label>
            <input type="text" class="form-control" id="race" name="race" value="<?= $race->race ?>" required>
        </div>
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <button type="submit" class="btn btn-primary">Mettre à Jour</button>
        <a href="/raceDashboard/listRaces" class="btn btn-danger">Annuler</a>
    </form>
</div>