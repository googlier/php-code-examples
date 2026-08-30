```php
<?php

class Shape {
    abstract public function area();
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

class ShapeFactory {
    public static function createShape($type, ...$args) {
        switch ($type) {
            case 'rectangle':
                return new Rectangle(...$args);
            case 'circle':
                return new Circle(...$args);
            default:
                throw new InvalidArgumentException("Unknown shape type");
        }
    }
}

$shapes = [
    ShapeFactory::createShape('rectangle', 5, 10),
    ShapeFactory::createShape('circle', 7)
];

$totalArea = 0;
foreach ($shapes as $shape) {
    $totalArea += $shape->area();
}

echo "Total Area: " . $totalArea;

?>
```