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
    case $page['inscription']:
        if(!isset($_SESSION['pseudo']))
            include $path['controllers'].$page['inscription'].'.php';
        else
            include $path['controllers'].$page['error404'].'.php';
    break;
    case $page['annonces']:
        include $path['controllers'].$page['annonces'].'.php';
    break;
    case $page['config-profil']:
        if(isset($_SESSION['pseudo']))
            include $path['controllers'].$page['config-profil'].'.php';
        else
            include $path['controllers'].$page['error404'].'.php';
    break;
    case $page['mon-profil']:
        if(isset($_SESSION['pseudo']))
            include $path['controllers'].$page['mon-profil'].'.php';
        else
            include $path['controllers'].$page['error404'].'.php';
    break;
    case $page['deconnexion']:
        include $path['controllers'].$page['deconnexion'].'.php';
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
    case $page['inscription']:
        if(!isset($_SESSION['pseudo']))
            include $path['views'].$page['inscription'].'.php';
        else
            include $path['views'].$page['error404'].'.php';
    break;
    case $page['annonces']:
        include $path['views'].$page['annonces'].'.php';
    break;
    case $page['config-profil']:
        if(isset($_SESSION['pseudo']))
            include $path['views'].$page['config-profil'].'.php';
        else
            include $path['views'].$page['error404'].'.php';
    break;
    case $page['mon-profil']:
        if(isset($_SESSION['pseudo']))
            include $path['views'].$page['mon-profil'].'.php';
        else
            include $path['views'].$page['error404'].'.php';
    break;
    default:
        include $path['views'].$page['error404'].'.php';
    break;
}


echo $page['annonces'];
var_dump($_SESSION);

//Bas de page, footer + script
    include $path['elt'].'bottom.php';
?>