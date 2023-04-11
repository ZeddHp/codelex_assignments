<?php

class Point
{
    public $x;
    public $y;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function printPoint()
    {
        echo "Point: (" . $this->x . ", " . $this->y . ")";
    }

    public function swapPoints($p1, $p2)
    {
        $temp = $p1;
        $p1 = $p2;
        $p2 = $temp;
    }

}