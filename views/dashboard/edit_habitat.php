<div class="container">
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form action="/habitatDashboard/editHabitat/<?= $habitat->id ?>" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Nom de l'habitat</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $habitat->name ?>" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image actuelle</label>
            <div class="mb-2">
                <img src="<?= $habitat->slug ?>" alt="<?= $habitat->name ?>"style="width: 150px;">
            </div>
            <label for="image" class="form-label">Changer l'image (facultatif)</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">descriptionl de l'habitat</label>
            <textarea type="text" class="form-control" id="description" name="description" value="<?= $habitat->description ?>" required><?= $habitat->description ?></textarea>
        </div>
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <button type="submit" class="btn btn-primary">Mettre à Jour</button>
        <a href="/habitatDashboard/listHabitats" class="btn btn-secondary">Annuler</a>
    </form>
</div>
