<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Warrior
 *
 * @author pabhoz
 */
class Warrior extends Character{
    function __construct($name) {
        parent::__construct($name, 1, 10, 4, 6, 2, 6, 110);
    }
     
    public function attack(\ICharacter $target): void {
        $damage = (!$this->isCritical( (0.6 * $this->getAgi()) / 100)) ? 1.4 * $this->getStr() : (1.4 * $this->getStr()) * 2 ;
        echo $this->getName()." strikes ".$target->getName()." for ".$damage." hp! </br>";
        $target->getDamage($damage, true);
    }

    public function getDamage(float $value, bool $isMagical): void {
        $takenDamage = ($isMagical) ? $value - $this->getMDef() : $value - (0.8 * $this->getFDef());
        echo "Damage taken from attack: ".$takenDamage."</br>";
        $this->setHp($this->getHp() - $takenDamage);
        echo $this->getName()." now has ".$this->getHp()." hp </br>";
        if($this->getHp() <= 0){ 
            $this->iDie(); 
        }
    }

    public function getStat(string $statName): float {
        
    }

    public function iDie(): void {
        parent::iDie(); 
    }

    public function setStat(string $statName, float $value): void {
        
    }

    public function setStats(array $stats): void {
        
    }

    public function oneLevelUp(): void{
        $value = $this->getLevel() + 1;
        $this->setLevel($value);
    }
        
    function setLevel($level): void {
        $this->level = $level;
        $this->setStr($this->getStr() * (2.3 * ($this->getLevel() - 1)));
        $this->setIntl($this->getIntl() * (1.5 * ($this->getLevel() - 1)));
        $this->setAgi($this->getAgi() * (1.6 * ($this->getLevel() - 1)));
        $this->setFDef($this->getFDef() * (1.6 * ($this->getLevel() - 1)));
        $this->setMDef($this->getMDef() * (1.1 * ($this->getLevel() - 1)));
        $this->setHp($this->getHp() * (1.5 * ($this->getLevel() - 1)));
    }
}
