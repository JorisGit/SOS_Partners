<?php
$modif = array(
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
?>