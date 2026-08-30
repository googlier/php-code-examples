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
    private $shapes;

    public function __construct() {
        $this->shapes = [];
    }

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

$calculator = new AreaCalculator();
$calculator->addShape(new Circle(5));
$calculator->addShape(new Rectangle(4, 6));
echo "Total Area: " . $calculator->totalArea();
?>
```