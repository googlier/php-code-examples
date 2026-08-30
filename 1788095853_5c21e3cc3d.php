```php
<?php
class Shape {
    public function area() {
        return 0;
    }
}

class Circle extends Shape {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function area() {
        return M_PI * $this->radius * $this->radius;
    }
}

class Square extends Shape {
    private $side;

    public function __construct($side) {
        $this->side = $side;
    }

    public function area() {
        return $this->side * $this->side;
    }
}

class AreaCalculator {
    public function calculateArea(Shape $shape) {
        return $shape->area();
    }
}

$shapes = [
    new Circle(5),
    new Square(10)
];

$calculator = new AreaCalculator();

foreach ($shapes as $shape) {
    echo "Area: " . $calculator->calculateArea($shape) . "<br>";
}
?>
```