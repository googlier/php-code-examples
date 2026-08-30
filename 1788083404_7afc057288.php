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

class Square extends Shape {
    private $side;

    public function __construct($side) {
        $this->side = $side;
    }

    public function area() {
        return $this->side * $this->side;
    }
}

class ShapeFactory {
    public static function createShape($type, $dimensions) {
        switch ($type) {
            case 'circle':
                return new Circle($dimensions['radius']);
            case 'square':
                return new Square($dimensions['side']);
            default:
                throw new Exception('Unknown shape type');
        }
    }
}

try {
    $shape = ShapeFactory::createShape('circle', ['radius' => 5]);
    echo "Area of Circle: " . $shape->area() . "\n";

    $shape = ShapeFactory::createShape('square', ['side' => 4]);
    echo "Area of Square: " . $shape->area() . "\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
```