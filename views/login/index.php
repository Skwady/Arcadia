<?php
$link = '/assets/css/dashboard.css';
$title = 'Login';
?>

<section class="text-center d-flex justify-content-center align-items-center vh-100 content">
    <div class="container p-4 col-12 col-md-8 col-lg-4">
        <h2>Connexion</h2>
        <form method="POST" class="p-3" id="loginForm" action="/login/conect">
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" name="email" id="email" class="form-control mb-3">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" name="password" id="password" class="form-control mb-3">
            </div>
            <div>
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                <button type="submit" id="submit" class="btn btn-primary w-50">Connexion</button> 
            </div>
        </form>
        <div id="error-message"></div>
    </div>    
</section>