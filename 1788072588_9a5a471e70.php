```php
<?php

class Shape {
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

function calculateTotalArea($shapes) {
    $totalArea = 0;
    foreach ($shapes as $shape) {
        $totalArea += $shape->area();
    }
    return $totalArea;
}

$shapes = [
    new Circle(5),
    new Square(10)
];

echo calculateTotalArea($shapes);
?>
```