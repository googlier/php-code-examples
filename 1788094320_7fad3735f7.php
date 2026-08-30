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
        return pi() * pow($this->radius, 2);
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

function calculateTotalArea(array $shapes) {
    $totalArea = 0;
    foreach ($shapes as $shape) {
        $totalArea += $shape->area();
    }
    return $totalArea;
}

$shapes = [
    new Circle(5),
    new Rectangle(4, 3)
];

echo calculateTotalArea($shapes);
?>
```