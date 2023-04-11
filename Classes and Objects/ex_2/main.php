<?php
require 'Classes and Objects\ex_2\Point.php';

use obj\ex_2\Point;


$p1 = new Point(1, 2);
$p2 = new Point(3, 4);
$p1->swapPoints($p1, $p2);

$p1->printPoint();

