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

class AreaCalculator {
    public function calculateArea(Shape $shape) {
        return $shape->area();
    }
}

$circle = new Circle(5);
$rectangle = new Rectangle(4, 6);

$calculator = new AreaCalculator();

echo "Circle Area: " . $calculator->calculateArea($circle) . "\n";
echo "Rectangle Area: " . $calculator->calculateArea($rectangle) . "\n";
?>
```