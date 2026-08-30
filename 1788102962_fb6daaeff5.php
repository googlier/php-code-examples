```php
<?php

class Shape {
    abstract public function area();
}

class Circle extends Shape {
    protected $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function area() {
        return pi() * pow($this->radius, 2);
    }
}

class Rectangle extends Shape {
    protected $width;
    protected $height;

    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }

    public function area() {
        return $this->width * $this->height;
    }
}

class ShapeAreaCalculator {
    public function calculateArea(Shape $shape) {
        return $shape->area();
    }
}

$shapes = [
    new Circle(5),
    new Rectangle(10, 20)
];

$calculator = new ShapeAreaCalculator();

foreach ($shapes as $shape) {
    echo "Area: " . $calculator->calculateArea($shape) . "\n";
}

?>
```