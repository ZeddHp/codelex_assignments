<?php

$person = new stdClass();
$person->name = "John";
$person->surname = "Doe";
$person->age = 50;

//Using dump method, dump out all 3 values.
var_dump($person->name, $person->surname, $person->age);