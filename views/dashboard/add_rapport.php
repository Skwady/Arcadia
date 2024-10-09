<div class="container">
    <h2 class="text-center">Ajouter un Rapport</h2>

    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form action="/rapportDashboard/addRapport" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Titre</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="dates" class="form-label">Date</label>
            <input type="date" class="form-control" id="dates" name="dates" required>
        </div>

        <div class="mb-3">
            <label for="states" class="form-label">État de santé</label>
            <input type="text" class="form-control" id="states" name="states">
        </div>

        <?php if (isset($_SESSION['role']) && ($_SESSION['role'] === 'Admin' || $_SESSION['role'] === 'Veterinaire')): ?>        

        <div class="mb-3">
            <label for="recommended_food" class="form-label">Nourriture Recommandée</label>
            <input type="text" class="form-control" id="recommended_food" name="recommended_food">
        </div>

        <div class="mb-3">
            <label for="recommended_weight" class="form-label">Grammage Recommandée</label>
            <input type="number" class="form-control" id="recommended_weight" name="recommended_weight">
        </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['role']) && ($_SESSION['role'] === 'Admin' || $_SESSION['role'] === 'Employe')): ?> 
        <div class="mb-3">
            <label for="food_given" class="form-label">Nourriture donnée</label>
            <input type="text" class="form-control" id="food_given" name="food_given">
        </div>

        <div class="mb-3">
            <label for="quantity_donated" class="form-label">Quantité donnée</label>
            <input type="number" class="form-control" id="quantity_donated" name="quantity_donated">
        </div>
        <?php endif; ?>
        
        <div class="mb-3">
            <label for="commentaire" class="form-label">Commentaire sur l'habitat</label>
            <input type="text" class="form-control" id="commentaire" name="commentaire">
        </div>

        <div class="mb-3">
            <label for="id_animal" class="form-label">Animal</label>
            <select class="form-control" id="id_animal" name="id_animal">
                <option value="">Sélectionnez un animal</option>
                <?php foreach ($animals as $animal): ?>
                    <option value="<?= $animal->id ?>"><?= $animal->name ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
