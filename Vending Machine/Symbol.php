<?php

class Symbol
{
    public string $name;
    public int $points;

    public function __construct($name, $points)
    {
        $this->name = $name;
        $this->points = $points;
    }
}