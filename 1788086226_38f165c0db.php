```php
<?php
class Shape {
    public function area() {
        throw new Exception("Area method should be overridden");
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

class Rectangle extends Shape {
    private $length;
    private $width;
    public function __construct($length, $width) {
        $this->length = $length;
        $this->width = $width;
    }
    public function area() {
        return $this->length * $this->width;
    }
}

class AreaCalculator {
    public function calculateArea(Shape $shape) {
        return $shape->area();
    }
}

$shapes = [
    new Circle(5),
    new Rectangle(4, 6)
];

$calculator = new AreaCalculator();
foreach ($shapes as $shape) {
    echo "Area: " . $calculator->calculateArea($shape) . "\n";
}
?>
```