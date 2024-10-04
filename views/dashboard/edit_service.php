<div class="container">
    <form action="/serviceDashboard/editService/<?= $service->id ?>" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Nom du service</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $service->name ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="5" required><?= $service->description ?></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Nouvelle image (facultatif)</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/jpeg, image/png, image/jpg, image/webp">
            <small class="form-text text-muted">Vous pouvez uploader une nouvelle image. Laissez vide pour conserver l'ancienne.</small>
        </div>
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <button type="submit" class="btn btn-primary">Mettre à jour le service</button>
        <a href="/serviceDashboard/listServices" class="btn btn-secondary">Annuler</a>
    </form>
</div>
