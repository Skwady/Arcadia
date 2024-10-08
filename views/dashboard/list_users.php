<div class="container">
    <h2 class="text-center">Liste des Utilisateurs</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user->name ?></td>
                    <td><?= $user->firstname ?></td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->role ?></td>
                    <td>
                        <a href="/usersDashboard/editUser/<?= $user->id ?>" class="btn btn-warning">Modifier</a>
                        <a href="/usersDashboard/deleteUser/<?= $user->id ?>" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>