```php
<?php
class Shape {
    public function area() {
        return 0;
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
        return pi() * $this->radius * $this->radius;
    }
}

class AreaCalculator {
    public function calculate($shape) {
        return $shape->area();
    }
}

$shapes = [
    new Rectangle(5, 10),
    new Circle(7)
];

$calculator = new AreaCalculator();

foreach ($shapes as $shape) {
    echo "Area: " . $calculator->calculate($shape) . "<br>";
}
?>
```