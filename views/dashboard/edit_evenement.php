<div class="container">
    <form action="/evenementDashboard/updateEvenement/<?= $evenement->_id ?>" method="post">
        <div class="mb-3">
            <label for="description" class="form-label">Description de l'événement :</label>
            <textarea id="description" name="description" class="form-control"><?= htmlspecialchars($evenement->description) ?></textarea>
        </div>
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
