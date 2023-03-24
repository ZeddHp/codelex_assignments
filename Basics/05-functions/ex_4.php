<?php
require "ex_3.php";
//Create a array of objects that uses the function of exercise 3 but in loop printing out if the person has reached age of 18.

$persons = array(
    array(
        "name" => "John",
        "surname" => "Doe",
        "age" => 30,
        "birthday" => "1992-05-15"
    ),
    array(
        "name" => "Jane",
        "surname" => "Doe",
        "age" => 25,
        "birthday" => "1997-02-20"
    ),
    array(
        "name" => "Bob",
        "surname" => "Smith",
        "age" => 17,
        "birthday" => "1977-11-12"
    )
);

foreach ($persons as $person) {
    $person = (object)$person;
    echo isEighteen($person) ? "Person has reached age of 18" : "Person has not reached age of 18";
    echo "\n";
}


