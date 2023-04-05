<?php
//Foo Corporation needs a program to calculate how much to pay their hourly employees.
//The US Department of Labor requires that employees get paid time and a half for any hours over 40 that they work in a single week.
//For example, if an employee works 45 hours, they get 5 hours of overtime, at 1.5 times their base pay.
//The State of Massachusetts requires that hourly employees be paid at least $8.00 an hour.
//Foo Corp requires that an employee not work more than 60 hours in a week.

function calculatePay($hoursWorked, $hourlyRate)
{
    $overtimeHours = 0;
    $overtimeRate = 1.5;
    $minimumWage = 8.00;
    $maximumHours = 60;

    if ($hoursWorked > $maximumHours) {
        $hoursWorked = $maximumHours;

    }

    if ($hoursWorked > 40) {
        $overtimeHours = $hoursWorked - 40;
        $hoursWorked = 40;
    }

    $pay = $hoursWorked * $hourlyRate + $overtimeHours * $hourlyRate * $overtimeRate;

    if ($pay < $minimumWage) {
        $pay = $minimumWage;
    }

    return $pay;
}

function printPay($hoursWorked, $hourlyRate)
{
    $pay = calculatePay($hoursWorked, $hourlyRate);
    echo "Hours worked: $hoursWorked" . PHP_EOL;
    echo "Hourly rate: $hourlyRate" . PHP_EOL;
    echo "Pay: $pay" . PHP_EOL;
}

printPay(35, 7.50);
printPay(47, 8.20);
printPay(73, 10.00);






