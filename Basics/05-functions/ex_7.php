<?php
//Imagine you own a gun store. Only certain guns can be purchased with license types.
//Create an object (person) that will be the requester to purchase a gun (object) Person object has a name, valid licenses (multiple) & cash.
//Guns are objects stored within an array. Each gun has license letter, price & name.
//Using PHP in-built functions determine if the requester (person) can buy a gun from the store.

$guns = array(
    array(
        "name" => "AK-47",
        "license" => "A",
        "price" => 1000
    ),
    array(
        "name" => "M4A1",
        "license" => "B",
        "price" => 1500
    ),
    array(
        "name" => "M16A4",
        "license" => "C",
        "price" => 2000
    )
);


function createPerson(string $name, array $licenses, int $cash): stdClass
{
    $person = new stdClass();
    $person->name = $name;
    $person->licenses = $licenses;
    $person->cash = $cash;
    return $person;
}

function createGun(string $name, string $license, int $price): stdClass
{
    $gun = new stdClass();
    $gun->name = $name;
    $gun->license = $license;
    $gun->price = $price;
    return $gun;
}

$person = createPerson("John", ["A", "B"], 5000);


function displayGuns(array $guns): void
{
    foreach ($guns as $gun) {
        echo "Name: " . $gun["name"] . "\n";
        echo "License: " . $gun["license"] . "\n";
        echo "Price: " . $gun["price"] . "\n" . "\n";
    }
}

function canBuyGun(stdClass $person, stdClass $gun): bool
{
    return in_array($gun->license, $person->licenses) && $person->cash >= $gun->price;
}


function displayPerson(stdClass $person): void
{
    echo "Name: " . $person->name . "\n";
    echo "Licenses: " . implode(", ", $person->licenses) . "\n";
    echo "Cash: " . $person->cash . "\n" . "\n";
}

function menu(): void
{
    echo "1. Display guns" . "\n";
    echo "2. Display person" . "\n";
    echo "3. Buy gun" . "\n";
    echo "4. Exit" . "\n";

}

while (true) {
    menu();

    echo "Enter choice: ";
    $choice = (int)readline();

    switch ($choice) {
        case 1:
            displayGuns($GLOBALS["guns"]);
            break;
        case 2:
            displayPerson($GLOBALS["person"]);
            break;
        case 3:
            echo "Enter gun name: ";
            $gunName = (string)readline();
            $gun = array_filter($GLOBALS["guns"], function ($gun) use ($gunName) {
                return $gun["name"] == $gunName;
            });
            if (count($gun) == 0) {
                echo "Gun not found" . "\n";
                break;
            }
            $gun = createGun($gun[0]["name"], $gun[0]["license"], $gun[0]["price"]);
            if (canBuyGun($GLOBALS["person"], $gun)) {
                echo "Gun purchased" . "\n";
                $GLOBALS["person"]->cash -= $gun->price;
                $guns = array_filter($GLOBALS["guns"], function ($gun) use ($gunName) {
                    return $gun["name"] != $gunName;
                });
            } else {
                echo "Gun not purchased" . "\n";
            }
            break;
        case 4:
            exit();
        default:
            echo "Invalid choice" . "\n";
    }
}



