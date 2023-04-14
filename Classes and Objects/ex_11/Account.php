<?php

namespace ex_11;

class Account
{

    public $name;
    public $balance;


    public function __construct($name, $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function __toString()
    {
        $balance = number_format(abs($this->balance), 2, '.', '');
        $currency = ($this->balance < 0) ? "-$" : "$";
        return $this->name . ', ' . $currency . $balance;
    }

    function transfer(Account $from, Account $to, int $howMuch)
    {
        $from->withdraw($howMuch);
        $to->deposit($howMuch);
    }

    public function withdraw($amount)
    {
        $this->balance -= $amount;
    }

    public function deposit($amount)
    {
        $this->balance += $amount;
    }
}