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
                throw new Exception("Invalid shape type");
        }
    }
}

try {
    $shape = ShapeFactory::createShape('circle', ['radius' => 5]);
    echo "Area of Circle: " . $shape->area();
    echo "\n";

    $shape = ShapeFactory::createShape('rectangle', ['width' => 10, 'height' => 5]);
    echo "Area of Rectangle: " . $shape->area();
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
```