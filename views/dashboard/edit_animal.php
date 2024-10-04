<div class="container"> 
    <form action="/animalDashboard/editAnimal/<?= $animal->id ?>" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $animal->name ?>" required>
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Âge</label>
            <input type="number" class="form-control" id="age" name="age" value="<?= $animal->age ?>">
        </div>
    
        <div class="mb-3">
            <label for="id_race" class="form-label">Espèce</label>
            <select class="form-control" id="id_race" name="id_race" required>
                <option value="">Sélectionnez une espèce</option>
                <?php foreach ($races as $race): ?>
                    <option value="<?= $race->id ?>" <?= ($race->id == $animal->id_race) ? 'selected' : '' ?>>
                        <?= $race->race ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="id_habitat" class="form-label">Habitat</label>
            <select class="form-control" id="id_habitat" name="id_habitat" required>
                <option value="">Sélectionnez un habitat</option>
                <?php foreach ($habitats as $habitat): ?>
                    <option value="<?= $habitat->id ?>" <?= ($habitat->id == $animal->id_habitat) ? 'selected' : '' ?>>
                        <?= $habitat->name ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image de l'animal</label>
            <input type="file" class="form-control" id="image" name="image">
            <small>Image actuelle : <img src="<?= $animal->slug ?>" alt="<?= $animal->name ?>" style="width: 50px;"></small>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea type="text" class="form-control" id="description" name="description" required><?= $animal->description ?></textarea>
        </div>

        <div class="mb-3">
            <label for="dyk" class="form-label">Le Saviez-vous</label>
            <textarea type="text" class="form-control" id="dyk" name="dyk" required><?= $animal->dyk ?></textarea>
        </div>
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <button type="submit" class="btn btn-primary">Mettre à Jour</button>
        <a href="/animalDashboard/listAnimals" class="btn btn-danger">Annuler</a>
    </form>
</div>   