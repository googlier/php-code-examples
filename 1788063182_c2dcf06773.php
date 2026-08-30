```php
<?php
class Shape {
    public function area() {
        throw new Exception("Method 'area' must be implemented.");
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
    public static function createShape($type, ...$params) {
        switch ($type) {
            case 'Circle':
                return new Circle(...$params);
            case 'Rectangle':
                return new Rectangle(...$params);
            default:
                throw new Exception("Unknown shape type.");
        }
    }
}

$shapes = [
    ShapeFactory::createShape('Circle', 5),
    ShapeFactory::createShape('Rectangle', 3, 4)
];

foreach ($shapes as $shape) {
    echo "Area: " . $shape->area() . "\n";
}
?>
```