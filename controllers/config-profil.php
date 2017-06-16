<?php

if(isset($_POST['confirm'])) {

    if(isset($_POST['supprimer-compte'])) {
        $configProfil['supprimer-compte'] = htmlspecialchars($_POST['supprimer-compte']);
    }

    $configProfil = array(
        'password' => htmlspecialchars(hash(hash_algos()[7], $_POST['newmdp'])),
        'newmdp-confirm' => htmlspecialchars(hash(hash_algos()[7], $_POST['newmdp-confirm'])),
        'email' => htmlspecialchars($_POST['email']),
        'newemail' => htmlspecialchars($_POST['newemail']),
        'mdp-confirm' => htmlspecialchars(hash(hash_algos()[7], $_POST['mdp'])),
        'pseudo' => htmlspecialchars($myProfil->getPseudo())
    );


    $modifProfil = new Profil($configProfil);
    $ProfilManager = new ProfilManager(getDb());
    if($configProfil['mdp-confirm'] == $myProfil->getMdp()) {
        if(!empty($configProfil['password']) AND !empty($configProfil['newmdp-confirm'])){
            if($configProfil['password'] == $configProfil['newmdp-confirm']) {
              $ProfilManager->updateMdp($modifProfil);
              $alert = "Votre mot de passe a bien été changé.";
            } else {
                $alert = "Votre nouveau mot de passe ne correspond pas à la confirmation de votre nouveau mot de passe.";
            }
        }
        if(!empty($configProfil['email']) AND !empty($configProfil['newemail'])){
            if($configProfil['email'] == $configProfil['newemail']){
              $ProfilManager->updateEmail($modifProfil);
              $alert = "Votre adresse email a bien été changé.";
            } else {
              $alert = "Votre nouvelle adresse email ne correspond pas à la validation de votre nouvelle adresse email.";
            }
        }
    } else {
        $alert = "Validation du mot de passe actuel incorrect";
    }


}

?>
