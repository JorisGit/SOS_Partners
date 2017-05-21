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

        $profil = new Profil($user['pseudo'], $user['mdp'], $user['email'], $user['newsletter'], $user['prenom'], $user['nom'], $user['sexe'], $dateNaissance, $user['departement'], $user['ville']);
        $profilManager = new ProfilManager(getDb());
        if($user['cgu'] == 1) { 
            if(!filter_var($pseudo, FILTER_VALIDATE_EMAIL))
                if(strlen($user['pseudo']) <= 12) {
                    if($profil->mdpSecure()) {
                        if($user['mdp'] == $user['mdp2']) {
                            if($profil->verifNomPrenom()) {
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
            else
                $alert = "Votre pseudo ne doit pas être une adresse mail";
        } else
            $alert = "Vous ne pouvez pas vous inscrire si vous n'acceptez pas les Conditions Générales d'Utilisations.";
    }
?>