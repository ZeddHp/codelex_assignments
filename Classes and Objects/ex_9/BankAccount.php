<?php

namespace ex_9;


class BankAccount
{
    public function show_user_name_and_balance()
    {
        $balance = number_format(abs($this->balance), 2, '.', '');
        $currency = ($this->balance < 0) ? "-$" : "$";
        return $this->name . ', ' . $currency . $balance;
    }
}

$ben = new Account();
$ben->name = "Benson";
$ben->balance = -17.5;
echo $ben->show_user_name_and_balance();