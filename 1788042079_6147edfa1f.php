```php
<?php

class Shape {
    public function area() {
        throw new Exception("Area method must be implemented in the subclass");
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

class Circle extends Shape {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function area() {
        return pi() * pow($this->radius, 2);
    }
}

class AreaCalculator {
    private $shapes;

    public function __construct($shapes) {
        $this->shapes = $shapes;
    }

    public function calculateTotalArea() {
        $totalArea = 0;
        foreach ($this->shapes as $shape) {
            $totalArea += $shape->area();
        }
        return $totalArea;
    }
}

$shapes = [
    new Rectangle(5, 10),
    new Circle(3)
];

$areaCalculator = new AreaCalculator($shapes);
echo "Total Area: " . $areaCalculator->calculateTotalArea();

?>
```