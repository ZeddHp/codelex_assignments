<?php
//Write a program to produce the sum of 1, 2, 3, ..., to 100.
// Store 1 and 100 in variables lower bound and upper bound, so that we can change their values easily.

$lowerBound = 1;
$upperBound = 100;
$sum = 0;
for ($i = $lowerBound; $i <= $upperBound; $i++) {
    $sum += $i;
}

echo "The sum of 1 to 100 is $sum";
echo "The average is " . $sum / ($upperBound - $lowerBound + 1);

