<?php
Class Prisoner {

public $id;
public function selectRandomBox(){
return $firstPick=rand(1,100);
}
function __construct($name) 
{
    $this->id = $name;
}

}

$groupofPrisoners= [];

for ($i=1; $i<=100 ; $i++) {
array_push($groupofPrisoners, new Prisoner($i));
}