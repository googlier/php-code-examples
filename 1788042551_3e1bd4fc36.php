```php
<?php
class Shape {
    protected $color;

    public function __construct($color) {
        $this->color = $color;
    }

    public function getColor() {
        return $this->color;
    }

    abstract public function getArea();
}

class Circle extends Shape {
    protected $radius;

    public function __construct($color, $radius) {
        parent::__construct($color);
        $this->radius = $radius;
    }

    public function getArea() {
        return M_PI * pow($this->radius, 2);
    }
}

class Rectangle extends Shape {
    protected $width;
    protected $height;

    public function __construct($color, $width, $height) {
        parent::__construct($color);
        $this->width = $width;
        $this->height = $height;
    }

    public function getArea() {
        return $this->width * $this->height;
    }
}

class AreaCalculator {
    protected $shapes;

    public function __construct($shapes) {
        $this->shapes = $shapes;
    }

    public function calculateTotalArea() {
        $totalArea = 0;
        foreach ($this->shapes as $shape) {
            $totalArea += $shape->getArea();
        }
        return $totalArea;
    }
}

$shapes = [
    new Circle('red', 5),
    new Rectangle('blue', 4, 3)
];

$calculator = new AreaCalculator($shapes);
echo "Total Area: " . $calculator->calculateTotalArea();
?>
```