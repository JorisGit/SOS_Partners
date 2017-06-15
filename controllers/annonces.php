<?php

$sportsManager = new SportsManager(getDb());
$sportsList = $sportsManager->getList();
$sportTypeList = $sportsManager->getType();
?>