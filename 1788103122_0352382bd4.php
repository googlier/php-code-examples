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
    public static function getShape($type, $params) {
        if ($type === 'rectangle') {
            return new Rectangle($params['width'], $params['height']);
        } elseif ($type === 'circle') {
            return new Circle($params['radius']);
        } else {
            throw new Exception("Unknown shape type");
        }
    }
}

$shapes = [
    ShapeFactory::getShape('rectangle', ['width' => 5, 'height' => 10]),
    ShapeFactory::getShape('circle', ['radius' => 7])
];

foreach ($shapes as $shape) {
    echo "Area: " . $shape->area() . "\n";
}
?>
```