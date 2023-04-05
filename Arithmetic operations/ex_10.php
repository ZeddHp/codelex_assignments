<?php
//Design a Geometry class with the following methods:
//A static method that accepts the radius of a circle and returns the area of the circle. Use the following formula:
//Area = π * r * 2
//Use Math.PI for π and r for the radius of the circle
//A static method that accepts the length and width of a rectangle and returns the area of the rectangle. Use the following formula:
//Area = Length x Width
//A static method that accepts the length of a triangle’s base and the triangle’s height. The method should return the area of the triangle. Use the following formula:
//Area = Base x Height x 0.5
//The methods should display an error message if negative values are used for the circle’s radius, the rectangle’s length or width, or the triangle’s base or height.

class Geometry
{
    public static function circleArea($radius)
    {
        if ($radius < 0) {
            echo "Error: Radius cannot be negative";
            return;
        }
        return pi() * $radius * $radius;
    }

    public static function rectangleArea($length, $width)
    {
        if ($length < 0 || $width < 0) {
            echo "Error: Length and width cannot be negative";
            return;
        }
        return $length * $width;
    }

    public static function triangleArea($base, $height)
    {
        if ($base < 0 || $height < 0) {
            echo "Error: Base and height cannot be negative";
            return;
        }
        return $base * $height * 0.5;
    }
}

echo "Geometry Calculator\n";
echo "1. Calculate the Area of a Circle";
echo "2. Calculate the Area of a Rectangle";
echo "3. Calculate the Area of a Triangle";
echo "4. Quit\n";
echo "Enter your choice (1-4) : ";

$choice = readline();

switch ($choice) {
    case 1:
        $radius = readline("Enter the radius of the circle: ");
        echo "The area of the circle is " . Geometry::circleArea($radius);
        break;
    case 2:
        $length = readline("Enter the length of the rectangle: ");
        $width = readline("Enter the width of the rectangle: ");
        echo "The area of the rectangle is " . Geometry::rectangleArea($length, $width);
        break;
    case 3:
        $base = readline("Enter the base of the triangle: ");
        $height = readline("Enter the height of the triangle: ");
        echo "The area of the triangle is " . Geometry::triangleArea($base, $height);
        break;
    case 4:
        echo "Goodbye!";
        break;
    default:
        echo "Invalid choice";
        break;
}

