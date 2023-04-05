<?php
//Write a program that creates an array of ten integers.
//It should put ten random numbers from 1 to 100 in the array.
//It should copy all the elements of that array into another array of the same size.

$numbers = [];
$numbers2 = [];

for ($i = 0; $i < 10; $i++) {
    $numbers[] = rand(1, 100);
}

$numbers2 = $numbers;

$numbers[count($numbers) - 1] = -7;

echo "Array 1: " . implode(", ", $numbers) . PHP_EOL;
echo "Array 2: " . implode(", ", $numbers2) . PHP_EOL;

