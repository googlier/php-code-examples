```php
<?php

interface Shape {
    public function area();
}

class Circle implements Shape {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function area() {
        return pi() * $this->radius * $this->radius;
    }
}

class Square implements Shape {
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
                throw new Exception('Unknown shape type');
        }
    }
}

// Usage
$shapes = [
    ['circle', ['radius' => 5]],
    ['square', ['side' => 4]]
];

foreach ($shapes as $shape) {
    $shapeInstance = ShapeFactory::createShape($shape[0], $shape[1]);
    echo "Area of " . ucfirst($shape[0]) . ": " . $shapeInstance->area() . "<br>";
}

?>
```