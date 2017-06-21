<?php

    $connexionSport = new SportsManager(getDb());

    $sportList = $connexionSport->getList();

    if(isset($_POST['ajouterannonce'])){
        $annonce = array(
            'titre' => htmlspecialchars($_POST['titre']),
            'nbParticipant' => htmlspecialchars($_POST['nbParticipant']),
            'jour' => htmlspecialchars($_POST['jour']),
            'mois' => htmlspecialchars($_POST['mois']),
            'annee' => htmlspecialchars($_POST['annee']),
            'sport' => htmlspecialchars($_POST['sport']),
            'codePostal' => htmlspecialchars($_POST['code']),
            'description' => htmlspecialchars($_POST['description']),
            'idProfil' => $myProfil->getId()
        );

        $dateEvenement = $annonce['annee'].'-'.$annonce['mois'].'-'.$annonce['jour'];

        $annonce['dateEvenement'] = $dateEvenement;
        $Sport = $connexionSport->get($annonce['sport']);

        $annonce['idSport'] = $Sport->getId();

        $annonces = new Annonces($annonce);
        $annoncesManager = new AnnoncesManager(getDb());
        $ajout = $annoncesManager->insert($annonces);
    }
?>