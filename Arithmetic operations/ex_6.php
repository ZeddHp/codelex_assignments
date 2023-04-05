<?php
//Write a program called coza-loza-woza.php which prints the numbers 1 to 110, 11 numbers per line.
//The program shall print "Coza" in place of the numbers which are multiples of 3, "Loza" for multiples of 5, "Woza" for multiples of 7, "CozaLoza" for multiples of 3 and 5, and so on.

$coza = 3;
$loza = 5;
$woza = 7;
$cozaLoza = $coza * $loza;
$cozaWoza = $coza * $woza;
$lozaWoza = $loza * $woza;
$cozaLozaWoza = $coza * $loza * $woza;

$lowerBound = 1;
$upperBound = 110;
$numbersPerLine = 11;

for ($i = $lowerBound; $i <= $upperBound; $i++) {
    if ($i % $cozaLozaWoza == 0) {
        echo "CozaLozaWoza";
    } elseif ($i % $cozaLoza == 0) {
        echo "CozaLoza";
    } elseif ($i % $cozaWoza == 0) {
        echo "CozaWoza";
    } elseif ($i % $lozaWoza == 0) {
        echo "LozaWoza";
    } elseif ($i % $coza == 0) {
        echo "Coza";
    } elseif ($i % $loza == 0) {
        echo "Loza";
    } elseif ($i % $woza == 0) {
        echo "Woza";
    } else {
        echo $i;
    }

    if ($i % $numbersPerLine == 0) {
        echo " " . PHP_EOL;
    } else {
        echo " ";
    }
}


