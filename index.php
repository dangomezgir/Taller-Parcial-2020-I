<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once './config.php';
require_once './mvcBootstrap.php';

$character = CharacterFactory::getCharacter(1);//No sé por qué esto aquí no está seteando las estadísticas con el set level, solo está poniendo el id y el nombre
print_r($character);