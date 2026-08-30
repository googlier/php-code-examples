```php
<?php
class Shape {
    abstract public function area();
}

class Rectangle implements Shape {
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

class Circle implements Shape {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function area() {
        return pi() * pow($this->radius, 2);
    }
}

class AreaCalculator {
    private $shapes = [];

    public function addShape(Shape $shape) {
        $this->shapes[] = $shape;
    }

    public function calculateTotalArea() {
        $totalArea = 0;
        foreach ($this->shapes as $shape) {
            $totalArea += $shape->area();
        }
        return $totalArea;
    }
}

$rectangle = new Rectangle(5, 10);
$circle = new Circle(7);

$calculator = new AreaCalculator();
$calculator->addShape($rectangle);
$calculator->addShape($circle);

echo "Total Area: " . $calculator->calculateTotalArea();
?>
```