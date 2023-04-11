<?php

namespace obj\ex_1;

class Product
{
    public $name;
    public $price;
    public $amount;

    public function __construct($name, $price, $amount)
    {
        $this->name = $name;
        $this->price = $price;
        $this->amount = $amount;
    }

    public function printProduct()
    {
        echo "Product: " . $this->name . ", price: " . $this->price . ", amount: " . $this->amount;
    }

    public function changeAmount($newAmount)
    {
        $this->amount = $newAmount;
    }

    public function changePrice($newPrice)
    {
        $this->price = $newPrice;
    }
}