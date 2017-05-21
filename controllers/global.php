<?php
    if(isset($_POST['login'])){
    require $path['models'].'global.php';
        $identifiant = htmlspecialchars($_POST['identifiant']);
        $mdp = htmlspecialchars(hash(hash_algos()[7], $_POST['mdpLog']));

            if(isset($_POST['souvenirLog'])){
                $souvenir = true;
            } else {
                $souvenir = false;
            }

        $connexion = new ProfilManager(getDb());

        $connexion->loginCompte($identifiant, $mdp, $souvenir);

        if($connexion->loginCompte($identifiant, $mdp, $souvenir) == false) {
            $alert = "Erreur de pseudo/email ou de mot de passe";
        }
    }
    
?>