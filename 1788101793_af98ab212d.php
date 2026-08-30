```php
<?php
class Shape {
    public function area() {
        return 0;
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
    public static function createShape($shapeType, $params) {
        switch ($shapeType) {
            case 'circle':
                return new Circle($params['radius']);
            case 'square':
                return new Square($params['side']);
            default:
                return null;
        }
    }
}

$shapes = [
    'circle' => ['radius' => 5],
    'square' => ['side' => 10]
];

foreach ($shapes as $type => $params) {
    $shape = ShapeFactory::createShape($type, $params);
    echo "Area of {$type}: " . $shape->area() . "\n";
}
?>
```