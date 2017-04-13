<?php

session_start();

if(!defined('ROOT_DIR')){
define('ROOT_DIR', '');
};

$dbname = "sospartner";
$user   = "root";
$pass   = "";

try {
    $BDD = new PDO("mysql:host=localhost;dbname=$dbname", $user, $pass);
} catch(PDOException $e) {
    die($e->getMessage());
}

?>