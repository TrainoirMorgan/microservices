<?php
session_start();
var_dump($_SESSION);
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
            <h1>Login</h1>
            <p><a href="register-form.php">Pas encore inscrit ?</a></p>
        </div>
        <form method="post" action="login.php">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="jeandupont@example.com">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
            <?php if(!empty($_SESSION['error'])){
                echo $_SESSION['error'];
            }?>
        </form>
    </main>
    <?php
    include_once 'inc/footer.php';
    ?>
</body>

</html>