```php
<?php
class Shape {
    public function area() {
        throw new Exception("This method should be overridden");
    }
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
    public static function create($type, $size) {
        switch ($type) {
            case 'circle':
                return new Circle($size);
            case 'square':
                return new Square($size);
            default:
                throw new Exception("Unknown shape type");
        }
    }
}

$shapes = [
    ShapeFactory::create('circle', 5),
    ShapeFactory::create('square', 4)
];

foreach ($shapes as $shape) {
    echo "Area: " . $shape->area() . "<br>";
}
?>
```