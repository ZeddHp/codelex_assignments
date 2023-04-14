<?php

use ex_11\Account;

$matts_acc = new Account("Matt's account", 100.00);
$my_acc = new Account("My account", 0);

echo "Initial state";
echo $matts_acc;
echo $my_acc;

$matts_acc->withdraw(100);
echo "Matt's account balance is now: " . $matts_acc->balance();
$my_acc->deposit(100);
echo "My account balance is now: " . $my_acc->balance();

echo "Final state";
echo $matts_acc;
echo $my_acc;


$a_acc = new Account("A", 100.00);
$b_acc = new Account("B", 0);
$c_acc = new Account("C", 0);

echo "Initial state";
echo $a_acc;
echo $b_acc;
echo $c_acc;

$a_acc->transfer($a_acc, $b_acc, 50);
$b_acc->transfer($b_acc, $c_acc, 25);


echo "Final state";
echo $a_acc;
echo $b_acc;
echo $c_acc;
