<?php

    function existCompte($email, $mdp){
        global $BDD;

        $sql = "SELECT * FROM profils WHERE email = ? AND password = ?";

        $requete = $BDD->prepare($sql);
        $requete->execute(array($email, $mdp));
        $compt = $requete->rowCount();

        $row = $requete->fetch(PDO::FETCH_BOTH);
        $pseudo = $row['pseudo'];

        if($compt == 1){
            $_SESSION['pseudo'] = $pseudo;

            include 'include/cookies.php';

            return true;
        }else{
            return false;
        }
    }
?>