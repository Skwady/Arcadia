<?php $links = '/assets/css/detail.css'; ?>

<div class="container">

<h1 class="text-center">Détails du Rapport</h1>

    <table class="table table-bordered">
        <tr>
            <th>Titre</th>
            <td><?= $rapport->name ?></td>
        </tr>
        <tr>
            <th>Date</th>
            <td><?= $rapport->dates ?></td>
        </tr>
        <tr>
            <th>État de santé</th>
            <td><?= $rapport->states ?></td>
        </tr>
        <tr>
            <th>Nourriture Recommandée</th>
            <td><?= $rapport->recommended_food ?></td>
        </tr>
        <tr>
            <th>Grammage Recommandé</th>
            <td><?= $rapport->recommended_weight." g" ?></td>
        </tr>
        <tr>
            <th>Nourriture Donnée</th>
            <td><?= $rapport->food_given ?></td>
        </tr>
        <tr>
            <th>Quantité Donnée</th>
            <td><?= $rapport->quantity_donated." g" ?></td>
        </tr>
        <tr>
            <th>Animal</th>
            <td><?= $rapport->animalName ?></td>
        </tr>
        <tr>
            <th>commentaire</th>
            <td><?= $rapport->commentaire ?></td>
        </tr>
        <tr>
            <th>Utilisateur</th>
            <td><?= $rapport->userName ?></td>
        </tr>
    </table>
    <a href="/rapportDashboard/listRapports" class="btn btn-primary">Retour à la liste des rapports</a>
</div>