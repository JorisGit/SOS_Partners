<?php

include_once 'include/config.php';

$p = (isset($_GET['p'])) ? $_GET['p'] : 'index';

include_once 'include/define.php';

//controllers
switch($p) {
    case $page['accueil']:
        include 'controllers/accueil.php';
    break;
    case 'index':
        include 'controllers/accueil.php';
    break;
    case $page['inscription']:
        include 'controllers/inscription.php';
    break;
    default:
        include 'controllers/error404.php';
    break;
}

//Haut de page, head + header
    include 'public/elt/top.php';

//views
switch($p) {
    case $page['accueil']:
        include 'views/accueil.php';
    break;
    case 'index':
        include 'views/accueil.php';
    break;
    case $page['inscription']:
        include 'views/inscription.php';
    break;
    default:
        include 'views/error404.php';
    break;
}

//Bas de page, footer + script
    include 'public/elt/bottom.php';

?>