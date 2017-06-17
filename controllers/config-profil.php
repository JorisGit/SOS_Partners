<?php
if(isset($_POST['confirm'])) {
    $configProfil = array(
        'email' => htmlspecialchars($_POST['email']),
        'newemail' => htmlspecialchars($_POST['newemail']),
        'mdp-confirm' => htmlspecialchars(hash(hash_algos()[7], $_POST['mdp'])),
        'pseudo' => htmlspecialchars($myProfil->getPseudo()),
    );
    if(!empty($_POST['nouveaumdp'])) {
        $configProfil['password'] = htmlspecialchars(hash(hash_algos()[7], $_POST['nouveaumdp']));
    }
    if(!empty($_POST['nouveaumdpconfirm'])) {
        $configProfil['nouveaumdpconfirm'] = htmlspecialchars(hash(hash_algos()[7], $_POST['nouveaumdpconfirm']));
    }
    if(isset($_POST['supprimercompte'])) {
        $configProfil['supprimercompte'] = htmlspecialchars($_POST['supprimercompte']);
    } else{
        $configProfil['supprimercompte'] = 'off';
    }
    var_dump($configProfil);
    $modifProfil = new Profil($configProfil);
    $ProfilManager = new ProfilManager(getDb());
    if($configProfil['mdp-confirm'] == $myProfil->getMdp()) {
        if(!empty($configProfil['password']) AND !empty($configProfil['nouveaumdpconfirm'])){
            if($configProfil['password'] == $configProfil['nouveaumdpconfirm']) {
               $ProfilManager->updateMdp($modifProfil);
               session_destroy();
                $alert = "Votre mot de passe a bien été changé, merci de vous reconnectez avec votre nouveau mot de passe.";
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
        if($configProfil['supprimercompte'] == 'on'){
            $ProfilManager->delete($modifProfil);
            header('Location:'.$link['accueil']);
            $alert = "Votre compte a bien été supprimé";
        }
    } else {
        $alert = "Validation du mot de passe actuel incorrect";
    }
}
?>