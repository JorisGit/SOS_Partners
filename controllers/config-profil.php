<?php

if(isset($_POST['confirm'])) {

    $configProfil = array(
        'newmdp' => htmlspecialchars(hash(hash_algos()[7], $_POST['newmdp'])),
        'newmdp-confirm' => htmlspecialchars(hash(hash_algos()[7], $_POST['newmdp-confirm'])),
        'email' => htmlspecialchars($_POST['email']),
        'newemail' => htmlspecialchars($_POST['newemail']),
        'supprimer-compte' => htmlspecialchars($_POST['supprimer-compte']),
        'mdp-confirm' => htmlspecialchars(hash(hash_algos()[7], $_POST['mdp'])),
    );
    
    if($configProfil['mdp-confirm'] == $myProfil->getMdp()){
        if(!empty($configProfil['newmdp']) AND !empty($configProfil['newmdp-confirm'])){
            if(preg_match('#(([a-zA-Z]+[0-9]+|[0-9]+[a-zA-Z]+).*|.*([a-zA-Z]+[0-9]+|[0-9]+[a-zA-Z]+).*|[a-zA-Z]+.*[0-9]+|[0-9]+.*[a-zA-Z])#', $configProfil['newmdp']) && strlen($configProfil['newmdp']) >= 6) {
                if($configProfil['newmdp'] == $configProfil['newmdp-confirm']){
                    $donnee = new Profil($configProfil);
                    $update = new ProfilManager(getDb());
                    $update->update($configProfil['newmdp']);
                } else {
                    $alert = "Votre nouveau mot de passe ne correspond pas à la confirmation de votre nouveau mot de passe.";
                }
            
            } else {
                $alert = "Votre nouveau mot de passe n'est pas conforme, il faut minimum 1 majuscule, 1 chiffre, 1 caractère spécial et minimum 6 caractères.";
            }
            
        } // Suite avec le mail à faire

    }
    

}

?>