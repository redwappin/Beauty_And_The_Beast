<?php


class Match{

    protected $PlayersInMatch=array();
    protected $NumberOfPlayerInBlueTeam=0;
    protected $NumberOfPlayerInRedTeam=0;

    public function _setNewPlayerInMatch(Player $Player){
        array_push($this->PlayersInMatch,$Player);
        if($Player->_getTeam()== "Red"){
            $this->NumberOfPlayerInRedTeam=$this->NumberOfPlayerInRedTeam+1;
        }
        if($Player ->_getTeam()== "Blue"){
            $this->NumberOfPlayerInBlueTeam=$this->NumberOfPlayerInBlueTeam+1;
        }
    }
    public function DisplayOfPlayersInMatch(String $Team){
        $json=file_get_contents(__DIR__.'/../data/Characters.json');
        $overwatchCharacters=json_decode($json, true);
        foreach ($this->PlayersInMatch as $key) {
            $color='#00BFFF';
            if($Team=="Red"){
                $color='#B40431';
            }
            if ($key->_getTeam()==$Team){
                print('<div class="col-lg-4">');
                print('<img class="rounded-circle" src='.$overwatchCharacters[$key->_getCharacterName()]['images']['icon'].'alt="Generic placeholder image" width="150" height="150" style="border:2px solid '.$color.'">');
                print( '<h2>'.$key->_getName().'</h2> </div>');
            }
        }
    }
    public function _getNbOfPlayersInBlueTeam(){
        return $this->NumberOfPlayerInBlueTeam;
    }
    public function _getNbOfPlayersInRedTeam(){
        return $this->NumberOfPlayerInRedTeam;
    }
    public function _getNbPlayersInMatch(){
        return count($this->PlayersInMatch);
    }


}


 ?>
