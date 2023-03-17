<?php

session_start();
require('Database.php');
include('functions.php');;

// Récupère la connexion à la base de donnée ( PDO ). 
$db = new Database();
$connexion = $db->getPDO();

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $fields = array('email','password');

    if (check_form_fields_not_empty($fields)){

        $email = $_POST['email'];
        $password = $_POST['password'];

        try {

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                           
                $stmt = $connexion->prepare('SELECT * FROM utilisateurs WHERE Email = ?');
                $stmt->execute(array($email));
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                // On stocke dans exist une condition pour vérifier après que l'utilisateur existe, en effet si la méthode rowcount renvoit bien 1 c'est que l'utilisateur existe
                $exists = $stmt->rowCount() == 1;
            } 


            
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
        
        if($exists === true && (password_verify($password,$row['Password']))){

            

            $_SESSION['user-login'] = $row['Email'];
            $_SESSION['user-id'] = $row['user-id'];
            $_SESSION['user-firstname'] = $row['Prénom'];
            $_SESSION['user-lastname'] = $row['Nom'];            
            $_SESSION['loggedin'] = true;
            $_SESSION['error'] = '';          

            header ('Location: index.php');

        } 
        else {            
            header ('Location: login-form.php');
            $_SESSION['error'] = 'Aucun utilisateur avec cette combinaison mail/mot de passe n\'est enregistré';            
        }

    }
    else {
        header ('Location: login-form.php');
        $_SESSION['error'] = 'Veuillez remplir tous les champs';        
            
    }
}
?>