```php
<?php

class Shape {
    abstract function area();
}

class Circle extends Shape {
    private $radius;

    function __construct($radius) {
        $this->radius = $radius;
    }

    function area() {
        return pi() * $this->radius * $this->radius;
    }
}

class Square extends Shape {
    private $side;

    function __construct($side) {
        $this->side = $side;
    }

    function area() {
        return $this->side * $this->side;
    }
}

class AreaCalculator {
    private $shapes = [];

    function addShape(Shape $shape) {
        $this->shapes[] = $shape;
    }

    function totalArea() {
        $total = 0;
        foreach ($this->shapes as $shape) {
            $total += $shape->area();
        }
        return $total;
    }
}

$circle = new Circle(5);
$square = new Square(4);

$calculator = new AreaCalculator();
$calculator->addShape($circle);
$calculator->addShape($square);

echo "Total Area: " . $calculator->totalArea();

?>
```