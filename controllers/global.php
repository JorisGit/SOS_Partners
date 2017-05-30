<?php
    function chargerClasse($classe) {
        require 'models/'.$classe.'.php';
    }

    spl_autoload_register('chargerClasse');

    if(isset($_SESSION['pseudo'])) {
        
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
            $alert = "Erreur de pseudo/email ou de mot de passe.";
        }
    }
    
?>