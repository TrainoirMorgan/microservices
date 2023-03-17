<?php
include 'functions.php';
?>
<!doctype html>
<html lang="en">

<head>
    <?php
    include_once 'inc/head.php';
    ?>
</head>

<body>
    <?php
    include_once 'inc/header.php';
    ?>
    <main>
        <div class="container">
        <div class="mb-5">
            <h1>Inscription</h1>
            <p><a href="index.php">Déja inscrit ?</a></p>
        </div>
        <form method="post" action="register.php">
           
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Jean">
                <label for="firstname" class="form-label">Prénom</label>
                
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Dupont">
                <label for="lastname" class="form-label">Nom</label>
                
            </div>
            
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="jeandupont@example.com">
                <label for="email" class="form-label">Email</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="password">
                <label for="password" class="form-label">Mot de passe</label>
                <div class="form-text">8 caractères minimum et contenant au minimum une minuscule, une majuscule et un chiffre</div>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="password">
                <label for="confirmPassword" class="form-label">Confirmez votre mot de passe</label>
            </div>            

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </main>
    <?php
    include_once 'inc/footer.php';
    ?>
</body>

</html>