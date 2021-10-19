<?php


class bdd
{
    private $bdd;

    public function __construct()
    {

        $this->bdd = new PDO('mysql:host=localhost;dbname=projet_hsp;charset=utf8', 'root', '');
    }

    public function getStart(){
        return $this->bdd;
    }

}
