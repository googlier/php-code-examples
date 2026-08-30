```php
<?php

class Shape {
    abstract public function area();
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
    public static function createShape($type, $params) {
        switch ($type) {
            case 'circle':
                return new Circle($params['radius']);
            case 'rectangle':
                return new Rectangle($params['width'], $params['height']);
            default:
                throw new Exception("Unknown shape type");
        }
    }
}

$shapes = [
    ShapeFactory::createShape('circle', ['radius' => 5]),
    ShapeFactory::createShape('rectangle', ['width' => 10, 'height' => 20])
];

foreach ($shapes as $shape) {
    echo "Area: " . $shape->area() . "<br>";
}

?>
```