<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once './config.php';
require_once './mvcBootstrap.php';

//$char = CharacterFactory::newRogue("Percy");
//$char->create();
$charmander = CharacterFactory::getCharacter(1);
$arlakesh = CharacterFactory::getCharacter(2);
$percy = CharacterFactory::getCharacter(4);
//$percy->oneLevelUp();
//$percy->update();
// print_r($charmander);
// print_r($arlakesh);
// print_r($percy);
// $percy->attack($arlakesh);




