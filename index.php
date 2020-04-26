<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once './config.php';
require_once './mvcBootstrap.php';

// print_r($user);
//$arlakesh = CharacterFactory::newWarrior("Arlakesh");
//$arlakesh->create();
 //$arlakesh->delete();
 //$arlaPrint->attack();
 //print_r($arlaPrint);
 //print_r($charPrint);
//  $charmander = CharacterFactory::getCharacter(1);
//  $arlakesh = CharacterFactory::getCharacter(2);
// $arlakesh->attack($charmander);
// $arlakesh->attack($charmander);
// $arlakesh->attack($charmander);
// $arlakesh->attack($charmander);
// $arlakesh->attack($charmander);
// $arlakesh->attack($charmander);
// $arlakesh->attack($charmander);
// $arlakesh->attack($charmander);

$character = CharacterFactory::newRogue("Juanito");
print_r($character);
$character -> delete();

