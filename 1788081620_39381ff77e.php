```php
<?php

// Generate a random programming problem and solve it using a random design pattern

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

class ShapeFactory {
    public static function createShape($shapeType, ...$args) {
        switch ($shapeType) {
            case 'circle':
                return new Circle($args[0]);
            case 'rectangle':
                return new Rectangle($args[0], $args[1]);
            default:
                throw new InvalidArgumentException('Unknown shape type');
        }
    }
}

$shapes = [
    ShapeFactory::createShape('circle', 5),
    ShapeFactory::createShape('rectangle', 4, 3),
];

$totalArea = 0;
foreach ($shapes as $shape) {
    $totalArea += $shape->area();
}

echo "Total Area: " . $totalArea;

?>
```