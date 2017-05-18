<?php

    function existCompte($email, $mdp, $souvenir){
        global $BDD;

        $sql = "SELECT * FROM profils WHERE email = ? AND password = ?";

        $requete = $BDD->prepare($sql);
        $requete->execute(array($email, $mdp));
        $compt = $requete->rowCount();

        $row = $requete->fetch(PDO::FETCH_BOTH);
        $pseudo = $row['pseudo'];
        $avatar = $row['avatar'];

        if($compt == 1){
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['avatar'] = $avatar;
            $_SESSION['email'] = $email;
            $_SESSION['mdp'] = $mdp;
        if($souvenir == true){
            include 'include/cookies.php';
        }
            return true;
        }else{
            return false;
        }
    }
?>