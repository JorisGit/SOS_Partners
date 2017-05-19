<?php

session_start();

if(!defined('ROOT_DIR')){
define('ROOT_DIR', '');
};

function getDb() {

    $dbname = "sospartner";
    $user   = "root";
    $pass   = "";

    try {
        $db = new PDO("mysql:host=localhost;dbname=$dbname", $user, $pass);
    } catch(PDOException $e) {
        die($e->getMessage());
    }

    return $db;
}

?>