<?php
    function chargerClasse($classe) {
        require 'models/'.$classe.'.php';
    }

    spl_autoload_register('chargerClasse');

    if(isset($_SESSION['pseudo'])) {
        
        $connexion = new ProfilManager(getDb());
        $myProfil = $connexion->get($_SESSION['pseudo']);
        
        $pseudo = $_SESSION['pseudo'];

        if($p != $page['deconnexion'])
            $_SESSION['page'] = $p;

        if($_SESSION['page'] == $page['accueil'] || $_SESSION['page'] == $page['annonces'] || $_SESSION['page'] == $page['inscription'])
            $_SESSION['deconnexion'] = false;
        else
            $_SESSION['deconnexion'] = true;
    }

    if(isset($_POST['login'])){
        
        $identifiant = htmlspecialchars($_POST['identifiant']);
        $mdp = htmlspecialchars(hash(hash_algos()[7], $_POST['mdpLog']));

            if(isset($_POST['souvenirLog'])){
                $souvenir = true;
            } else {
                $souvenir = false;
            }

        $connexion = new ProfilManager(getDb());

        $log = $connexion->loginCompte($identifiant, $mdp, $souvenir);

        if($log == false) {
            $alert = "Pseudo/email ou mot de passe incorrect.";
        }
    }
    
?>