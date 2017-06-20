<?php
    function strAttr($str) {

    $str = htmlentities($str, ENT_NOQUOTES, 'utf-8');
    $str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
    $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
    $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères
    $str = strtolower(str_replace(' ', '-', $str));
    
    return $str;
    }

    function chargerClasse($classe) {
        require 'models/'.$classe.'.php';
    }

    spl_autoload_register('chargerClasse');

    if(isset($_SESSION['pseudo'])) {
        
        $profilManager = new ProfilManager(getDb());
        $myProfil = $profilManager->get($_SESSION['pseudo']);
        
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