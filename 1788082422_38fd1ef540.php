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
        return M_PI * pow($this->radius, 2);
    }
}

class Square extends Shape {
    private $side;

    public function __construct($side) {
        $this->side = $side;
    }

    public function area() {
        return pow($this->side, 2);
    }
}

class AreaCalculator {
    public function calculateArea(Shape $shape) {
        return $shape->area();
    }
}

$shapes = [
    new Circle(5),
    new Square(4)
];

$calculator = new AreaCalculator();

foreach ($shapes as $shape) {
    echo "Area of the shape: " . $calculator->calculateArea($shape) . "<br>";
}
?>
```