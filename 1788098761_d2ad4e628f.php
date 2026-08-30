```php
<?php
class Shape {
    abstract function area();
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
    public static function createShape($shapeType, $dimensions) {
        switch ($shapeType) {
            case 'circle':
                return new Circle($dimensions['radius']);
            case 'square':
                return new Square($dimensions['side']);
            default:
                throw new Exception('Invalid shape type');
        }
    }
}

$shapes = [
    ['type' => 'circle', 'dimensions' => ['radius' => 5]],
    ['type' => 'square', 'dimensions' => ['side' => 4]]
];

foreach ($shapes as $shape) {
    $shapeObj = ShapeFactory::createShape($shape['type'], $shape['dimensions']);
    echo "Area of {$shape['type']} is " . $shapeObj->area() . "<br>";
}
?>
```