<div class="container mt-5">
    <h2 class="text-center">Ajouter une Espèce</h2>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    <form action="/raceDashboard/addRace" method="POST">
        <div class="mb-3">
            <label for="race" class="form-label">Nom de l'espèce</label>
            <input type="text" class="form-control" id="race" name="race" required>
        </div>
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <button type="submit" class="btn btn-primary">Ajouter l'espèce</button>
    </form>
</div>
