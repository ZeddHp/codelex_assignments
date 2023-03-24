<?php
//Create a 2D associative array in 2nd dimension with fruits and their weight.
//Create a function that determines if fruit has weight over 10kg.
//Create a secondary array with shipping costs per weight.
//Meaning that you can say that over 10 kg shipping costs are 2 euros, otherwise its 1 euro.
//Using foreach loop print out the values of the fruits and how much it would cost to ship this product.

$fruits = array(
    array(
        "name" => "Apple",
        "weight" => 5
    ),
    array(
        "name" => "Banana",
        "weight" => 15
    ),
    array(
        "name" => "Orange",
        "weight" => 7
    )
);

$shippingCosts = array(
    array(
        "weight" => 10,
        "cost" => 1
    ),
    array(
        "weight" => 100,
        "cost" => 2
    )
);

function isOverTen($weight): bool
{
    return $weight > 10;
}

foreach ($fruits as $fruit) {
    $fruit = (object)$fruit;
    $shippingCost = isOverTen($fruit->weight) ? $shippingCosts[1]["cost"] : $shippingCosts[0]["cost"];
    echo "Fruit: " . $fruit->name . "\n";
    echo "Weight: " . $fruit->weight . "\n";
    echo "Shipping cost: " . $shippingCost . "\n" . "\n";
}

