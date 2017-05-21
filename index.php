<?php

include_once 'include/config.php';

$p = (isset($_GET['p'])) ? $_GET['p'] : 'index';

include_once 'include/define.php';

include_once $path['controllers'].'global.php';



//controllers
switch($p) {
    case $page['accueil']:
        include $path['controllers'].$page['accueil'].'.php';
    break;
    case 'index':
        include $path['controllers'].$page['accueil'].'.php';
    break;
    case $page['inscription']:
        include $path['controllers'].$page['inscription'].'.php';
    break;
    case $page['annonces']:
        include $path['controllers'].$page['annonces'].'.php';
    break;
    case $page['mon-profil']:
        include $path['views'].$page['mon-profil'].'.php';
    break;
    default:
        include $path['controllers'].$page['error404'].'.php';
    break;
}

//Haut de page, head + header
    include $path['elt'].'top.php';

//views
switch($p) {
    case $page['accueil']:
        include $path['views'].$page['accueil'].'.php';
    break;
    case 'index':
        include $path['views'].$page['accueil'].'.php';
    break;
    case $page['inscription']:
        include $path['views'].$page['inscription'].'.php';
    break;
    case $page['annonces']:
        include $path['views'].$page['annonces'].'.php';
    break;
    case $page['mon-profil']:
        include $path['views'].$page['mon-profil'].'.php';
    break;
    default:
        include $path['views'].$page['error404'].'.php';
    break;
}

//Bas de page, footer + script
    include $path['elt'].'bottom.php';
?>