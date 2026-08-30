```php
<?php

class Shape {
    abstract function area();
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

class ShapeCalculator {
    private $shapes = [];

    public function addShape(Shape $shape) {
        $this->shapes[] = $shape;
    }

    public function getTotalArea() {
        $totalArea = 0;
        foreach ($this->shapes as $shape) {
            $totalArea += $shape->area();
        }
        return $totalArea;
    }
}

$circle = new Circle(5);
$rectangle = new Rectangle(4, 6);

$calculator = new ShapeCalculator();
$calculator->addShape($circle);
$calculator->addShape($rectangle);

echo "Total Area: " . $calculator->getTotalArea();

?>
```