```php
<?php
class Shape {
    abstract function area();
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

class Circle extends Shape {
    protected $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function area() {
        return M_PI * $this->radius * $this->radius;
    }
}

class ShapeCalculator {
    private $shapes = [];

    public function addShape(Shape $shape) {
        $this->shapes[] = $shape;
    }

    public function totalArea() {
        $total = 0;
        foreach ($this->shapes as $shape) {
            $total += $shape->area();
        }
        return $total;
    }
}

$calculator = new ShapeCalculator();
$calculator->addShape(new Rectangle(5, 3));
$calculator->addShape(new Circle(4));
echo "Total Area: " . $calculator->totalArea();
?>
```