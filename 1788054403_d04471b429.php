```php
<?php
abstract class Shape {
    abstract public function area();
}

class Circle extends Shape {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function area() {
        return pi() * $this->radius * $this->radius;
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
        if ($type === 'circle') {
            return new Circle($params[0]);
        } elseif ($type === 'rectangle') {
            return new Rectangle($params[0], $params[1]);
        } else {
            throw new Exception('Invalid shape type');
        }
    }
}

$shapes = [
    ShapeFactory::createShape('circle', 5),
    ShapeFactory::createShape('rectangle', 3, 4)
];

foreach ($shapes as $shape) {
    echo "Area: " . $shape->area() . "<br>";
}
?>
```