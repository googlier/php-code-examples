```php
<?php
class Shape {
    abstract public function area();
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

class AreaCalculator {
    public function calculate($shapes) {
        $totalArea = 0;
        foreach ($shapes as $shape) {
            $totalArea += $shape->area();
        }
        return $totalArea;
    }
}

$shapes = [new Circle(5), new Rectangle(3, 4)];
$calculator = new AreaCalculator();
echo $calculator->calculate($shapes);
?>
```