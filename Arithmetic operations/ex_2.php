<?php
//Write a program called CheckOddEven which prints "Odd Number" if the int variable “number” is odd, or “Even Number” otherwise.
// The program shall always print “bye!” before exiting.
$number = 10;
if ($number % 2 == 0) {
    echo "Even Number";
} else {
    echo "Odd Number";
}

echo "bye!";
