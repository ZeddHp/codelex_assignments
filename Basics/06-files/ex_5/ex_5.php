<?php
//Create a .csv file that stores (ID, name, surname, age) of multiple persons.
//Create a program that accepts 1 argument (id of the user) and displays the user information if the user has been found.
//If the user has not been found, output that in the console.

echo 'Enter user ID: ';
$userID = readline();

$handle = fopen('data.csv', 'r');
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $user = explode(',', $line);
        if ($user[0] == $userID) {
            echo 'User found: ' . $user[1] . ' ' . $user[2] . ', ' . $user[3];
            exit;
        }
    }
    echo 'User not found.';
    fclose($handle);
} else {
    echo 'Error opening file.';
}


