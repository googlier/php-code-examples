```php
<?php
class Shape {
    public function area() {
        throw new Exception("This method should be overridden.");
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
    public static function createShape($type, $params) {
        switch ($type) {
            case 'circle':
                return new Circle($params['radius']);
            case 'square':
                return new Square($params['side']);
            default:
                throw new Exception("Unknown shape type.");
        }
    }
}

$shapes = [
    'circle' => ['radius' => 5],
    'square' => ['side' => 4]
];

$totalArea = 0;

foreach ($shapes as $type => $params) {
    $shape = ShapeFactory::createShape($type, $params);
    $totalArea += $shape->area();
}

echo "Total Area: " . $totalArea;
?>
```