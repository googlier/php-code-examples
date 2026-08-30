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
    public static function calculateArea(Shape $shape) {
        return $shape->area();
    }
}

// Usage
$shapes = [
    new Circle(5),
    new Rectangle(3, 4)
];

foreach ($shapes as $shape) {
    echo AreaCalculator::calculateArea($shape) . "\n";
}

?>
```