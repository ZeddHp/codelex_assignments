<?php
//Create an associative array with objects of multiple persons.
//Each person should have a name, surname, age and birthday. Using loop (by your choice) print out every persons personal data.

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
        "age" => 45,
        "birthday" => "1977-11-12"
    )
);

foreach ($persons as $person) {
    echo "Name: " . $person["name"] . "\n";
    echo "Surname: " . $person["surname"] . "\n";
    echo "Age: " . $person["age"] . "\n";
    echo "Birthday: " . $person["birthday"] . "\n" . "\n";
}


