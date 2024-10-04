<?php
$link = '/assets/css/dashboard.css';
$title = 'Dashboard';
?>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar navigation -->
        <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
            <div class="position-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active text-center" aria-current="page" href="/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/animalDashboard/listAnimals">Liste des Animaux</a>
                    </li>
                    <?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'Admin'): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/animalDashboard/addAnimal">Ajouter un Animal</a>
                    </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/raceDashboard/listRaces">Liste des espèces</a>
                    </li>
                    <?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'Admin'): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/raceDashboard/addRace">Ajouter une espèce</a>
                    </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/habitatDashboard/listHabitats">Liste des Habitats</a>
                    </li>
                    <?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'Admin'): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/habitatDashboard/addHabitat">Ajouter un Habitat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/usersDashboard/listUsers">Liste des Utilisateurs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/usersDashboard/addUser">Ajouter un Utilisateur</a>
                    </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/rapportDashboard/listRapports">Liste des Rapports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/rapportDashboard/addRapport">Ajouter un Rapport</a>
                    </li>
                    <?php if(isset($_SESSION['role']) && ($_SESSION['role'] === 'Admin' || $_SESSION['role'] === 'Employe')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/avisDashboard/listAvis">Liste des avis</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/serviceDashboard/addService">Ajouter un Service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/serviceDashboard/listServices">Liste des Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/evenementDashboard/listEvenement/<?php echo $evenement->_id; ?>">Ajouter un Événement</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/horaireDashboard/listHoraires">Service des Horaires</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>

        <!-- Section content -->
        <section class="col-md-9 ms-sm-auto col-lg-10 px-md-4 content">
            <?php
            // Dynamically display specific sections based on the $section variable
            if (isset($section) && $_SESSION['id']) {
                // Include the specific view based on $section
                require_once __DIR__ . "/$section.php";
            } else {
                echo "<h2 class='text-center'>Bienvenu sur le dashboard</h2>";
            }
            ?>
        </section>
    </div>
</div>
