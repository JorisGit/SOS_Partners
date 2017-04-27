<?php

$page = array(
    'accueil' => 'accueil',
    'inscription' => 'inscription'
    );

$link = array(
    'accueil' => 'index.php?p=accueil',
    'inscription' => 'index.php?p=inscription'
    );

$title = 'SOS Partner - ';

switch($p) {
    case $page['accueil']:
        $title .= 'Accueil';
    break;
    case 'index':
        $title .= 'Accueil';
    case $page['inscription']:
        $title .= 'Inscription';
    break;
    default:
        $title .= 'Page introuvable';
    break;
}

?>