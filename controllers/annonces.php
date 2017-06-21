<?php

$sportsManager = new SportsManager(getDb());
$annoncessManager = new AnnoncesManager(getDb());
$sportsList = $sportsManager->getList();
$sportTypeList = $sportsManager->getType();
$annoncesList = $annoncessManager->getList();

?>