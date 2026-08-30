```php
<?php

class Shape {
    public function area() {
        return "Area method should be overridden by subclasses.";
    }
}

class Rectangle extends Shape {
    private $width;
    private $height;

    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }

    public function area() {
        return $this->width * $this->height;
    }
}

class Circle extends Shape {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function area() {
        return pi() * pow($this->radius, 2);
    }
}

class ShapeAreaCalculator {
    public function calculateArea(Shape $shape) {
        return $shape->area();
    }
}

$rectangle = new Rectangle(5, 10);
$circle = new Circle(7);

$calculator = new ShapeAreaCalculator();

echo "Rectangle Area: " . $calculator->calculateArea($rectangle) . "<br>";
echo "Circle Area: " . $calculator->calculateArea($circle) . "<br>";

?>
```