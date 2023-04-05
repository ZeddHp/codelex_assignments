<?php
//Modify the example program to compute the position of an object after falling for 10 seconds, outputting the position in meters. The formula in Math notation is:
//Note: The correct value is -490.5m.

$gravity = -9.81;
$seconds = 10;
$initialVelocity = 0;

$position = 0.5 * $gravity * $seconds * $seconds + $initialVelocity * $seconds;

echo "The position of the object after falling for $seconds seconds is $position meters";

