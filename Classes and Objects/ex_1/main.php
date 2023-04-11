<?php
require 'Classes and Objects\Product.php';

use obj\ex_1\Product;

$product = new Product("Logitech mouse", 70.00, 14);
$product->printProduct();
$product->changeAmount(10);
$product->printProduct();


$p2 = new Product("iPhone 5s", 999.99, 3);
$p2->printProduct();

$p3 = new Product("Epson EB-U05", 440.46, 1);
$p3->printProduct();