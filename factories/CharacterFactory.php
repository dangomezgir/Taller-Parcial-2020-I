<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CharacterFactory
 *
 * @author pabhoz
 */
class CharacterFactory implements ICharacterFactory{
    
    public static function getCharacter(int $id): \ICharacter{
        $data = Character::getModel($id);
        $className = "new".ucfirst(Character::getClassName($data["characterClassId"]));
        $character = CharacterFactory::{$className}($data["name"]);
        echo "</br>".$data["level"]."</br>";
        $character->setId($data["id"]);
        if($data["level"] != 1){
            $character->setLevel($data["level"]);
        }
        return $character;
    }
    
    public static function newMage(string $name, string $house = null): \Mage {
        return new Mage($name, $house);
    }

    public static function newRogue(string $name): \Rogue {
        return new Rogue($name);
    }

    public static function newWarrior(string $name): \Warrior {
        return new Warrior($name);
    }
}
