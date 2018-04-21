<?php

class Player{
    protected $name;
    protected $characterName;
    protected $Team;
    protected $_nbVictory;
    protected $_nbDefeat;

 public function __construct(string $name, string $characterName, string $Team){
     $this->name=$name;
     $this->name=strtoupper($name);
     $this->characterName=$characterName;
     $this->Team=$Team;

 }
 public function _getName(){
     return $this->name;
 }
 public function _getCharacterName(){
     return $this->characterName;
 }
 public function _getTeam(){
     return $this->Team;
 }



}


 ?>
