```php
<?php
class Shape {
    abstract public function area();
}

class Rectangle implements Shape {
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

class Circle implements Shape {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function area() {
        return pi() * pow($this->radius, 2);
    }
}

class ShapeFactory {
    public static function getShape($shapeType, ...$args) {
        switch ($shapeType) {
            case 'rectangle':
                return new Rectangle($args[0], $args[1]);
            case 'circle':
                return new Circle($args[0]);
            default:
                throw new Exception('Unknown shape type');
        }
    }
}

$shapes = [
    ShapeFactory::getShape('rectangle', 5, 10),
    ShapeFactory::getShape('circle', 7)
];

foreach ($shapes as $shape) {
    echo 'Area: ' . $shape->area() . '<br>';
}
?>
```