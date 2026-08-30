```php
<?php
class Shape {
    public function area() {
        throw new Exception("Area method should be overridden.");
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

class Circle extends Shape {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function area() {
        return pi() * $this->radius * $this->radius;
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
                throw new Exception("Invalid shape type.");
        }
    }
}

try {
    $shapes = [
        ShapeFactory::createShape('rectangle', ['width' => 5, 'height' => 10]),
        ShapeFactory::createShape('circle', ['radius' => 7])
    ];

    foreach ($shapes as $shape) {
        echo "Area: " . $shape->area() . "<br>";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
```