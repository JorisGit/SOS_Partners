<?php

include_once 'include/config.php';

$p = (isset($_GET['p'])) ? $_GET['p'] : 'index';

include_once 'include/define.php';

//controllers
switch($p) {
    case $page['accueil']:
        include $path['controllers'].'accueil.php';
    break;
    case 'index':
        include $path['controllers'].'accueil.php';
    break;
    case $page['inscription']:
        include $path['controllers'].'inscription.php';
    break;
    case $page['annonces']:
        include $path['controllers'].'annonces.php';
    break;
    default:
        include $path['controllers'].'error404.php';
    break;
}

//Haut de page, head + header
    include $path['elt'].'top.php';

//views
switch($p) {
    case $page['accueil']:
        include $path['views'].'accueil.php';
    break;
    case 'index':
        include $path['views'].'accueil.php';
    break;
    case $page['inscription']:
        include $path['views'].'inscription.php';
    break;
    case $page['annonces']:
        include $path['views'].'annonces.php';
    break;
    default:
        include $path['views'].'error404.php';
    break;
}

//Bas de page, footer + script
    include $path['elt'].'bottom.php';
?>