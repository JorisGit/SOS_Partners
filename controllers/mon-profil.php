<?php
    $connexion = new ProfilManager(getDb());

    $infoProfil = $connexion->get($_SESSION['pseudo']);
?>