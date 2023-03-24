<?php
//Using PHP in-built functions create a program that accepts 1 argument - filename.
//Create a file with the filename of your choice and store information with comma separated (example. John, Doe, 10)
//Using PHP in-built functions read information from this file and create an object based on information from the file.
//Output the name, surname and age of the person in the output.

echo 'Enter file name: ';
$fileName = readline();
$handle = fopen($fileName, 'r');

if ($handle) {
    $data = fgetcsv($handle);
    fclose($handle);
}


$person = new stdClass();
$person->name = $data[0];
$person->surname = $data[1];
$person->age = $data[2];

echo $person->name . ' ' . $person->surname . ' ' . $person->age;