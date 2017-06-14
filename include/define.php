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
    'views' => 'views/',
    'avatars' => 'public/img/avatars/'
    );

$page = array(
    'accueil' => 'accueil',
    'inscription' => 'inscription',
    'annonces' => 'annonces',
    'mon-profil' => 'mon-profil',
    'error404' => 'error404',
    'config-profil' => 'config-profil',
    'accueil' => 'index'
    );

    $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $urlPart = explode('/', $url);

$link = array(
    'accueil' => 'http://'.$urlPart[0].'/'.$urlPart[1],
    'inscription' => 'inscription',
    'annonces' => 'annonces',
    'mon-profil' => 'mon-profil',
    'config-profil' => 'config-profil',
    'deconnexion' => $path['controllers'].'deconnexion.php'
    );

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
    case $page['config-profil']:
        $title .= 'Configurer mon profil';
        break;
    default:
        $title .= 'Page introuvable';
    break;
}

?>