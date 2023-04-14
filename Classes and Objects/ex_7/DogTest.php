<?php

namespace ex_7;
require_once 'Dog.php';

class DogTest
{
    public static function main()
    {

        $d6 = new Dog('Lady', 'female');
        $d7 = new Dog('Molly', 'female');
        $d5 = new Dog('Sam', 'male');
        $d3 = new Dog('Sparky', 'male');
        $d2 = new Dog('Rocky', 'male', $d7, $d5);
        $d1 = new Dog('Max', 'male', $d6, $d2);
        $d4 = new Dog('Buster', 'male', $d6, $d3);
        $d8 = new Dog('Coco', 'female', $d7, $d4);

        echo $d1->fathersName() . PHP_EOL;
        echo $d2->fathersName() . PHP_EOL;

        echo $d1->hasSameMotherAs($d2) ? "true" : "false";
        echo PHP_EOL;
        echo $d1->hasSameMotherAs($d3) ? "true" : "false";
        echo PHP_EOL;
        echo $d1->hasSameMotherAs($d4) ? "true" : "false";


    }


}

DogTest::main();

