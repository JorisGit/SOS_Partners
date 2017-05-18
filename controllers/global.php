<?php
    if(isset($_POST['valider'])){
    require 'models/global.php';
        $email = $_POST['email'];
        $mdp = sha1($_POST['mdp']);

            if(isset($_POST['souvenir'])){
                $souvenir = true;
            }
        $exist = existCompte($email, $mdp, $souvenir);
        if($exist == false){
            $erreur = "Erreur d'email ou de mot de passe";
        }
    }
    
?>