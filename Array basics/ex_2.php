<?php


$numbers = [20, 30, 25, 35, -16, 60, -100];

//todo calculate an average value of the numbers
$sum = 0;
foreach ($numbers as $number) {
    $sum += $number;
}
$average = $sum / count($numbers);

echo "Average: $average" . PHP_EOL;
