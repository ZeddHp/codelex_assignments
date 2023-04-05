<?php
//Write a program to accept two integers and return true if the either one is 15 or if their sum or difference is 15.

$a = 10;
$b = 5;

if ($a == 15 || $b == 15 || $a + $b == 15 || $a - $b == 15) {
    echo "True";
} else {
    echo "False";
}