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

class Square extends Shape {
    protected $side;

    public function __construct($side) {
        $this->side = $side;
    }

    public function area() {
        return pow($this->side, 2);
    }
}

class AreaCalculator {
    public function calculate(Shape $shape) {
        return $shape->area();
    }
}

$shapes = [
    new Circle(5),
    new Square(4)
];

$calculator = new AreaCalculator();

foreach ($shapes as $shape) {
    echo "Area: " . $calculator->calculate($shape) . "\n";
}

?>
```