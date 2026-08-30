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

$circle = new Circle(5);
$square = new Square(4);

$calculator = new AreaCalculator();
echo "Circle Area: " . $calculator->calculateArea($circle) . "\n";
echo "Square Area: " . $calculator->calculateArea($square) . "\n";
?>
```