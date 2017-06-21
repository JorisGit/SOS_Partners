<?php
    $connexion = new ProfilManager(getDb());

    $infoProfil = $connexion->get($_SESSION['pseudo']);

    if(isset($_POST['ajouterannonce'])){

        $annonce = array(
            'titre' => htmlspecialchars($_POST['titre']),
            'nbParticipant' => htmlspecialchars($_POST['nbParticipant']),
            'jour' => htmlspecialchars($_POST['jour']),
            'mois' => htmlspecialchars($_POST['mois']),
            'annee' => htmlspecialchars($_POST['annnee']),
            'codePostal' => htmlspecialchars($_POST['codePostal']),
            'description' => htmlspecialchars($_POST['description'])
        );
    }
?>