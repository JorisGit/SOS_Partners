<?php

$page = array('accueil' => 'accueil');
$title = 'SOS Partner - ';

switch($p) {
    case $page['accueil']:
        $title .= 'Accueil';
    break;
}

echo $title;

?>