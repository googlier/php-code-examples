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
    private $shapes = [];

    public function addShape(Shape $shape) {
        $this->shapes[] = $shape;
    }

    public function getTotalArea() {
        $total = 0;
        foreach ($this->shapes as $shape) {
            $total += $shape->area();
        }
        return $total;
    }
}

$calculator = new AreaCalculator();
$calculator->addShape(new Circle(5));
$calculator->addShape(new Square(4));

echo "Total Area: " . $calculator->getTotalArea();

?>
```