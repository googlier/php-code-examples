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
        return M_PI * pow($this->radius, 2);
    }
}

class Square extends Shape {
    private $side;

    public function __construct($side) {
        $this->side = $side;
    }

    public function area() {
        return pow($this->side, 2);
    }
}

class ShapeFactory {
    public static function createShape($type, $args) {
        switch ($type) {
            case 'circle':
                return new Circle($args['radius']);
            case 'square':
                return new Square($args['side']);
            default:
                throw new Exception('Invalid shape type');
        }
    }
}

$shapes = [
    ShapeFactory::createShape('circle', ['radius' => 5]),
    ShapeFactory::createShape('square', ['side' => 4])
];

foreach ($shapes as $shape) {
    echo 'Area: ' . $shape->area() . PHP_EOL;
}
?>
```