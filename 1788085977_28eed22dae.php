```php
<?php
class Shape {
    public function area() {
        throw new Exception("Area method should be overridden in child classes");
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

try {
    $shapes = [
        'circle' => ['radius' => 5],
        'rectangle' => ['width' => 4, 'height' => 6]
    ];

    foreach ($shapes as $type => $params) {
        $shape = ShapeFactory::createShape($type, $params);
        echo "Area of $type: " . $shape->area() . "\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
```