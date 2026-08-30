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
        return M_PI * pow($this->radius, 2);
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
    public static function createShape($type, ...$args) {
        switch ($type) {
            case 'circle':
                return new Circle(...$args);
            case 'rectangle':
                return new Rectangle(...$args);
            default:
                throw new InvalidArgumentException("Unknown shape type");
        }
    }
}

$shapes = [
    ShapeFactory::createShape('circle', 5),
    ShapeFactory::createShape('rectangle', 4, 6)
];

$totalArea = 0;
foreach ($shapes as $shape) {
    $totalArea += $shape->area();
}

echo "Total Area: " . $totalArea;
?>
```