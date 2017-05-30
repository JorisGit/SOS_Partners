<?php

    if(isset($_POST['inscription'])) {

        if(isset($_POST['newsletter'])) {
            $_POST['newsletter'] = 1;
        } else {
            $_POST['newsletter'] = 0;
        }

        if(isset($_POST['cgu'])) {
            $_POST['cgu'] = 1;
        } else {
            $_POST['cgu'] = 0;
        }


        $user = array(
        'pseudo' => htmlspecialchars($_POST['pseudo']),
        'mdp' => htmlspecialchars(hash(hash_algos()[7], $_POST['mdp'])),
        'mdp2' => htmlspecialchars(hash(hash_algos()[7], $_POST['mdp2'])),
        'email' => htmlspecialchars($_POST['email']),
        'prenom' => htmlspecialchars($_POST['prenom']),
        'nom' => htmlspecialchars($_POST['nom']),
        'sexe' => htmlspecialchars($_POST['sexe']),
        'jour' => htmlspecialchars($_POST['jour']),
        'mois' => htmlspecialchars($_POST['mois']),
        'annee' => htmlspecialchars($_POST['annee']),
        'departement' => htmlspecialchars($_POST['departement']),
        'ville' => htmlspecialchars($_POST['ville']),
        'newsletter' => $_POST['newsletter'],
        'cgu' => $_POST['cgu']
        );

        $date = new Date($user['jour'], $user['mois'], $user['annee']);

        if($date->verifDate()) {
            $dateNaissance = $user['jour'].'.'.$user['mois'].'.'.$user['annee'];
        } else {
            $dateNaissance = false;
        }

        $userClass = $user;
        $userClass['dateNaissance'] = $dateNaissance;
        
        unset($userClass['mdp2'], $userClass['cgu'], $userClass['jour'], $userClass['mois'], $userClass['annee']);

        $profil = new Profil($userClass);
        $profilManager = new ProfilManager(getDb());
        if($user['cgu'] == 1) { 
            if(!filter_var($user['pseudo'], FILTER_VALIDATE_EMAIL)) {
                //Vérifie si le pseudo ne dépasse pas 12 caractères
                if(strlen($user['pseudo']) <= 12) {
                    //Vérifie si le mot de passe comporte 1 lettre, 1 chiffre et a minimum 6 caractères
                    if(preg_match('#(([a-zA-Z]+[0-9]+|[0-9]+[a-zA-Z]+).*|.*([a-zA-Z]+[0-9]+|[0-9]+[a-zA-Z]+).*|[a-zA-Z]+.*[0-9]+|[0-9]+.*[a-zA-Z])#', $user['mdp']) && strlen($user['mdp']) >= 6) {
                        if($user['mdp'] == $user['mdp2']) {
                            //Vérifie la non présence de chiffre dans le prénom et le nom
                            if(preg_match('#^[[:alpha:]-\sÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]*$#', $user['prenom']) || preg_match('#^[[:alpha:]-\sÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]*$#', $user['nom'])) {
                                if($dateNaissance) {
                                    if(!$profilManager->pseudoExist($user['pseudo'])) {
                                        if(!$profilManager->emailExist($user['email'])) {
                                            $profilManager->insert($profil);
                                        } else
                                            $alert = "Cette adresse email est déjà utilisé.";
                                    } else
                                        $alert = "Ce pseudonyme a déjà été pris.";
                                } else
                                    $alert = "Date de naissance invalide.";
                            } else
                                $alert = "Prénom ou nom invalide.";
                        } else
                            $alert = "Les mots de passes ne se correspondent pas.";
                    } else
                        $alert = "Le mot de passe doit avoir au minimum 6 caractères, un chiffre et une lettre.";
                } else
                    $alert = "Le pseudo ne doit pas dépasser 12 caractères";
            } else
                $alert = "Votre pseudo ne doit pas être une adresse mail";
        } else
            $alert = "Vous ne pouvez pas vous inscrire si vous n'acceptez pas les Conditions Générales d'Utilisations.";
    }
?>