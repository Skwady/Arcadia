<div class="container mt-5">
    <h2 class="text-center">Ajouter un Habitat</h2>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    <form action="/habitatDashboard/addHabitat" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Nom de l'habitat</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image de l'habitat</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description de l'habitat</label>
            <textarea type="text" class="form-control" id="description" name="description" required></textarea>
        </div>
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <button type="submit" class="btn btn-primary">Ajouter Habitat</button>
    </form>
</div>