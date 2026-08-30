```php
<?php
abstract class Shape {
    abstract public function area();
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
    public static function createShape($type, ...$params) {
        switch ($type) {
            case 'rectangle':
                return new Rectangle($params[0], $params[1]);
            case 'circle':
                return new Circle($params[0]);
            default:
                throw new InvalidArgumentException("Invalid shape type");
        }
    }
}

$shapes = [
    ShapeFactory::createShape('rectangle', 5, 3),
    ShapeFactory::createShape('circle', 4)
];

foreach ($shapes as $shape) {
    echo "Area: " . $shape->area() . "\n";
}
?>
```