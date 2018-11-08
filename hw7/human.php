<?php
/**
 * Created by PhpStorm.
 * User: njbartel
 * Date: 11/8/2018
 * Time: 5:40 PM
 */

class human{
    public $name;
    private $money;
    private $energy;
    private $sleep;

    public function __construct($n){
        $this->name = $n;
    }

    public function getMoney(){
        return $this->money;
    }
    public function getEnergy(){
        return $this->energy;
    }
    public function getSleep(){
        return $this->sleep;
    }

    public function setMoney($m){
        $this->money = $m;
    }
    public function setEnergy($e){
        $this->energy = $e;
    }
    public function setSleep($s){
        $this->sleep = $s;
    }

    public function work($h){
        $this->money += 10 * $h;
        $this->sleep -= $h;
        $this->energy -= $h;
    }

    public function stateName(){
        echo $this->name . "<br>";
    }

    public function give1Money($h){
        $hmoney=$h->getMoney();
        $h->setMoney($hmoney - 1);
        $this->setMoney($this->getMoney()+1);
    }
}

?>