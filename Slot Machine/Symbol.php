<?php

class Symbol
{
    public $name;
    public $points;

    public function __construct($name, $points)
    {
        $this->name = $name;

        $this->points = $points;
    }

    public function image($name)
    {
        return "<img style='width:68px;' src='sprites/$name.jpg' >";
    }
}



