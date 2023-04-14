<?php

$surveyed = 12467;
$purchased_energy_drinks = 0.14;
$prefer_citrus_drinks = 0.64;

function calculate_energy_drinkers(int $numberSurveyed)
{
    //The approximate number of customers in the survey who purchased one or more energy drinks per week
    return $numberSurveyed * 0.14;
}

function calculate_prefer_citrus(int $numberSurveyed)
{
    //The approximate number of customers in the survey who prefer citrus flavored energy drinks
    return calculate_energy_drinkers($numberSurveyed) * 0.64;
}

echo "Total number of people surveyed " . $surveyed;

echo PHP_EOL . "Approximately " . calculate_energy_drinkers($surveyed) . " bought at least one energy drink";


echo PHP_EOL . "Approximately " . calculate_prefer_citrus($surveyed) . " of those " . "prefer citrus flavored energy drinks.";





