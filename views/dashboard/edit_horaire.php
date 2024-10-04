<div class="container">   
    <form id="horaireForm" action="/horaireDashboard/editHoraire/<?= $horaire->id ?>" method="POST">
        <div class="mb-3">
            <label for="horaire" class="form-label">horaire</label>
            <textarea type="text" class="form-control" id="horaire" name="horaire" value="<?= $horaire->horaire ?>" required></textarea>
        </div>
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <button type="submit" class="btn btn-primary">Mettre à jour l'horaire</button>
    </form>
</div>

<?php $script = '/assets/js/horaire.js' ?>