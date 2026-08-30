```php
<?php
class Shape {
    abstract function area();
}

class Rectangle extends Shape {
    private $width;
    private $height;

    function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }

    function area() {
        return $this->width * $this->height;
    }
}

class Circle extends Shape {
    private $radius;

    function __construct($radius) {
        $this->radius = $radius;
    }

    function area() {
        return pi() * pow($this->radius, 2);
    }
}

class ShapeFactory {
    static function getShape($type, ...$params) {
        switch ($type) {
            case 'Rectangle':
                return new Rectangle($params[0], $params[1]);
            case 'Circle':
                return new Circle($params[0]);
            default:
                throw new InvalidArgumentException("Unknown shape type");
        }
    }
}

$shapes = [
    ShapeFactory::getShape('Rectangle', 5, 10),
    ShapeFactory::getShape('Circle', 7)
];

foreach ($shapes as $shape) {
    echo "Area: " . $shape->area() . "\n";
}
?>
```