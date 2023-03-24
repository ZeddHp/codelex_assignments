<?php

//Given variables (int) 10, string "10" determine if they both are the same.
$int = 10;
$string = "10";

//check value
if ($int == $string) {
    echo "Both are the same";
} else {
    echo "Both are not the same";
}

//check value and type
if ($int === $string) {
    echo "Both are the same";
} else {
    echo "Both are not the same";
}