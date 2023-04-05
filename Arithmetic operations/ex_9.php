<?php
//Write a program that calculates and displays a person's body mass index (BMI).
//A person's BMI is calculated with the following formula: BMI = weight x 703 / height ^ 2.
//Where weight is measured in pounds and height is measured in inches.
//Display a message indicating whether the person has optimal weight, is underweight, or is overweight.
//A sedentary person's weight is considered optimal if his or her BMI is between 18.5 and 25. If the BMI is less than 18.5, the person is considered underweight.
//If the BMI value is greater than 25, the person is considered overweight.

//Your program must accept metric units.

$weight = readline("Enter your weight in kilograms: ");

$height = readline("Enter your height in meters: ");


$bmi = $weight / ($height * $height);

if ($bmi < 18.5) {
    echo "Underweight";
} else if ($bmi > 25) {
    echo "Overweight";
} else {
    echo "Optimal weight";
}



