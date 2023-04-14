<?php
//Demonstrate the classes by creating instances of each.
//Simulate filling the car up with fuel, and then run a loop that increments the odometer until the car runs out of fuel.
//During each loop iteration, print the car’s current mileage and amount of fuel.

require_once 'FuelGauge.php';
require_once 'Odometer.php';

$fuelGauge = new FuelGauge();
$odometer = new Odometer();

while ($fuelGauge->getFuel() < 70) {
    $fuelGauge->incrementFuel();
}

while ($fuelGauge->getFuel() > 0) {
    $odometer->incrementMileage();
    if ($odometer->getMileage() % 24 == 0) {
        $fuelGauge->decrementFuel();
    }
    echo "Mileage: " . $odometer->getMileage() . " Fuel: " . $fuelGauge->getFuel() . PHP_EOL;
}