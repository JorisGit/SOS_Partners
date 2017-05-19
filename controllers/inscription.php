<?php

    if(isset($_POST['inscription'])) {

        $user = array(
        'pseudo' => htmlspecialchars($_POST['pseudo']),
        'mdp' => htmlspecialchars($_POST['mdp']),
        'mdp2' => htmlspecialchars($_POST['mdp2']),
        'email' => htmlspecialchars($_POST['email']),
        'prenom' => htmlspecialchars($_POST['prenom']),
        'nom' => htmlspecialchars($_POST['nom']),
        'sexe' => htmlspecialchars($_POST['sexe']),
        'jour' => htmlspecialchars($_POST['jour']),
        'mois' => htmlspecialchars($_POST['mois']),
        'annee' => htmlspecialchars($_POST['annee']),
        'departement' => htmlspecialchars($_POST['departement']),
        'ville' => htmlspecialchars($_POST['ville']),
        'newsletter' => htmlspecialchars($_POST['newsletter'])
        );


        if(filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
            if($user['mdp'] == $user['mdp2']) {
                $profil = new Profil($user['pseudo'], $user['mdp'], $user['email'], $user['newsletter'], $user['prenom'], $user['nom'], $user['sexe'], $user['jour'], $user['departement'], $user['ville']);
                $profilManager = new ProfilManager(getDb());
                $profilManager->insert($profil);
            } else
                $alert = "Les mots de passes ne se correspondent pas.";
        } else
            $alert = "Veuillez saisir une adresse e-mail valide.";
    }

?>