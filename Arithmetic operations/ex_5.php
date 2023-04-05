<?php
//Write a program that picks a random number from 1-100. Give the user a chance to guess it.
// If they get it right, tell them so. If their guess is higher than the number, say "Too high."
// If their guess is lower than the number, say "Too low." Then quit. (They don't get any more guesses for now.)

$number = rand(1, 100);
$guess = 0;

while ($guess != $number) {
    $guess = readline("Guess a number from 1 to 100: ");
    if ($guess > $number) {
        echo "Too high. Try again." . PHP_EOL;
    } else if ($guess < $number) {
        echo "Too low. Try again." . PHP_EOL;
    }
}