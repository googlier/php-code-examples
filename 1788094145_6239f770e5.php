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
                return new Circle($args[0]);
            case 'rectangle':
                return new Rectangle($args[0], $args[1]);
            default:
                throw new Exception("Unknown shape type");
        }
    }
}

$shapes = [
    ShapeFactory::createShape('circle', 5),
    ShapeFactory::createShape('rectangle', 4, 3)
];

foreach ($shapes as $shape) {
    echo "Area: " . $shape->area() . "<br>";
}
?>
```