```php
<?php
abstract class Shape {
    abstract function area();
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

$circle = new Circle(5);
$square = new Square(4);

$calculator = new AreaCalculator();
$calculator->addShape($circle);
$calculator->addShape($square);

echo "Total Area: " . $calculator->calculateTotalArea();
?>
```