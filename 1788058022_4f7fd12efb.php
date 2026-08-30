```php
<?php

class Shape {
    abstract function area();
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
        return M_PI * pow($this->radius, 2);
    }
}

class ShapeFactory {
    public static function createShape($shapeType, $params) {
        switch ($shapeType) {
            case 'rectangle':
                return new Rectangle($params['width'], $params['height']);
            case 'circle':
                return new Circle($params['radius']);
            default:
                throw new Exception('Unknown shape type');
        }
    }
}

try {
    $shapes = [
        ShapeFactory::createShape('rectangle', ['width' => 5, 'height' => 10]),
        ShapeFactory::createShape('circle', ['radius' => 3])
    ];

    foreach ($shapes as $shape) {
        echo 'Area: ' . $shape->area() . PHP_EOL;
    }
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}

?>
```