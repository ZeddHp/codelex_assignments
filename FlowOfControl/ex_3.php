<?php

//Write a program that reads an positive integer and count the number of digits the number has.

$num = readline("Enter a positive integer: ");

$counter = 0;
while ($num > 0) {
    $num = (int)($num / 10);
    $counter++;
}
