```php
<?php

class Shape {
    abstract function area();
}

class Rectangle extends Shape {
    protected $width;
    protected $height;

    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }

    public function area() {
        return $this->width * $this->height;
    }
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

class ShapeFactory {
    public static function createShape($shapeType, ...$params) {
        switch ($shapeType) {
            case 'rectangle':
                return new Rectangle(...$params);
            case 'circle':
                return new Circle(...$params);
            default:
                throw new Exception('Unknown shape type');
        }
    }
}

$shapes = [
    ShapeFactory::createShape('rectangle', 5, 10),
    ShapeFactory::createShape('circle', 7)
];

foreach ($shapes as $shape) {
    echo 'Area: ' . $shape->area() . '<br>';
}

?>
```