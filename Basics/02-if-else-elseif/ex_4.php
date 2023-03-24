<?php

//By your choice, create condition with 3 checks.
//For example, if value is greater than X, less than Y and is an even number.

$int = 50;
if($int > 10 && $int < 100 && $int % 2 == 0){
    echo "Number is in range";
} else {
    echo "Number is not in range";
}