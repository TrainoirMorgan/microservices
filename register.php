<?php

require('Database.php');
include('functions.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // On établit la connexion PDO à la BDD

    $db = new Database();
    $connexion = $db->getPDO();

    // On stocke notre requete qui va créer la base si elle n'existe pas ainsi que la table avec toutes les colonnes nécéssaires

    $dbTable = 'utilisateurs';

    $fields = array('firstname', 'lastname', 'email', 'password', 'confirmPassword');

    $error = [];

    // On vérifie que les champs ne sont pas vide avec notre fonction

    if (check_form_fields_not_empty($fields)) {
        
       
        // On récupère nos données envoyé par le formulaire à l'aide la méthode post

        $firstname = htmlspecialchars($_POST['firstname']);
        $lastname = htmlspecialchars($_POST['lastname']);
        $email = htmlspecialchars($_POST['email']);
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
                 

        

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['validateEmail'] = "L'email renseigné n'est pas conforme au format email attendu";           
        } 

        $reqMail = $connexion->prepare('SELECT * FROM '.$dbTable.' WHERE Email = ?');
        $reqMail->execute(array($email));
        $mailExist = $reqMail->rowCount();

        if ($mailExist != 0) {
            $error['mailExist'] = "Un compte utilisant cet email existe déja";
        } 

        if (!checkpassword($password)){
            $error['validatePassword'] = "Le mot de passe ne correspond pas au format demandé : 8 caractères minimum avec une minuscule, une majuscule et un chiffre";
        }
        
        if($password != $confirmPassword){
            $error['passwordMatch'] = "Les champs mot de passe et confirmation mot de passe ne correspondent pas";
        }
        
    } else {
        $error['fieldsEmpty'] = 'Veuillez remplir tous les champs';
    }

    if (empty($error)) {   
        
        $password = password_hash($password, PASSWORD_DEFAULT);

        try {           

            // On prépare la requête d'insertion de nos données et on l'éxécute

            $sth = $connexion->prepare('INSERT INTO ' . $dbTable . '(Nom, Prénom, Email, Password, Rôle) VALUES (:lastname, :firstname, :email, :password, 1)');
            $sth->bindParam(':lastname', $lastname);
            $sth->bindParam(':firstname', $firstname);
            $sth->bindParam(':email', $email);
            $sth->bindParam(':password', $password);

            $sth->execute();

            // On envoie un email précisant que l'inscription a bien été effecctuée ainsi qu'un lien pour confirmer le compte avec le nom de l'utilisateur encodé et la clé de confirmation dans l'url        


            echo 'Inscription réussie, vous serez redirigez sur la page de connexion d\'ici quelques secondes sinon <a href="index.php">cliquez ici</a>';;


            header("Refresh:5; url=index.php");
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
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
    <?php foreach ($error as $value){
        echo $value . '<br>';
    }
    ?>
    <?php
    include_once 'inc/footer.php';
    ?>
</body>
</html>