<?php
require_once('Simulation.php');

Class Box {

    public $boxId;
    public $boxValue;

    function __construct($id) 
    {
        $this->boxId=$id;
    }
}

$box = new Box(1);
echo $box->boxId;