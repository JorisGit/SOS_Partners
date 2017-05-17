<?php
require 'models/global.php';

    if(isset($_POST['valider'])){

        $email = $_POST['email'];
        $mdp = sha1($_POST['mdp']);

            if(isset($_POST['souvenir'])){
            $souvenir = true;
            }
        $exist = existCompte($email, $mdp);
        if($exist == false){
            $erreur = "Erreur d'email ou de mot de passe";
        }else{
            echo $_SESSION['pseudo'];
        }
    }
    
?>