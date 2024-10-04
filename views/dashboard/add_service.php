<div class="container">
    <h1 class="text-center">Ajouter un Service</h1>

    <form action="/serviceDashboard/addService" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Nom du service</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image du service</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/jpeg, image/png, image/jpg, image/webp" required>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter le service</button>
        <a href="/serviceDashboard/listServices" class="btn btn-secondary">Annuler</a>
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
    </form>
</div>
