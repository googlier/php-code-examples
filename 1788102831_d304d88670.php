```php
<?php
abstract class Shape {
    abstract function area();
}

class Circle extends Shape {
    protected $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function area() {
        return M_PI * $this->radius * $this->radius;
    }
}

class Square extends Shape {
    protected $side;

    public function __construct($side) {
        $this->side = $side;
    }

    public function area() {
        return $this->side * $this->side;
    }
}

class ShapeFactory {
    public static function createShape($type, $params) {
        switch ($type) {
            case 'circle':
                return new Circle($params['radius']);
            case 'square':
                return new Square($params['side']);
            default:
                throw new Exception('Unknown shape type');
        }
    }
}

try {
    $circle = ShapeFactory::createShape('circle', ['radius' => 5]);
    $square = ShapeFactory::createShape('square', ['side' => 4]);

    echo "Circle Area: " . $circle->area() . "<br>";
    echo "Square Area: " . $square->area();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
```