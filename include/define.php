<?php

$path = array(
    'controllers' => 'controllers/',
    'include' => 'include/',
    'models' => 'models/',
    'css' => 'public/css/',
    'bootstrap' => 'public/css/bootstrap/',
    'elt' => 'public/elt/',
    'img' => 'public/img/',
    'js' => 'public/js/',
    'views' => 'views/'
    );

$page = array(
    'accueil' => 'accueil',
    'inscription' => 'inscription',
    'annonces' => 'annonces',
    'mon-profil' => 'mon-profil',
    'error404' => 'error404'
    );

$link = array(
    'accueil' => 'http://127.0.0.1/SOS_partners/',
    'inscription' => 'inscription',
    'annonces' => 'annonces',
    'monProfil' => 'mon-profil',
    'deconnexion' => $path['controllers'].'deconnexion.php'
    );

function chargerClasse($classe) {
        require 'models/'.$classe.'.php';
    }

spl_autoload_register('chargerClasse');

$title = 'SOS Partner - ';

//Titre de l'onglet
switch($p) {
    case $page['accueil']:
        $title .= 'Accueil';
    break;
    case 'index':
        $title .= 'Accueil';
    break;
    case $page['inscription']:
        $title .= 'Inscription';
    break;
    case $page['annonces']:
        $title .= 'Liste des annonces';
    break;
    default:
        $title .= 'Page introuvable';
    break;
}

?>