<?php

include_once 'include/config.php';

$p = (isset($_GET['p'])) ? $_GET['p'] : 'index';

include_once 'include/define.php';

switch($p) {
    case $page['accueil']:
        include 'controllers/accueil.php';
    break;
}

?>