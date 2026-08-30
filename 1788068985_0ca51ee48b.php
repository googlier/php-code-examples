```php
<?php
abstract class Shape {
    abstract public function area();
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
    public static function getShape($type, $params) {
        if ($type == 'circle') {
            return new Circle($params);
        } elseif ($type == 'square') {
            return new Square($params);
        }
        return null;
    }
}

$shapes = [
    ShapeFactory::getShape('circle', 5),
    ShapeFactory::getShape('square', 4)
];

foreach ($shapes as $shape) {
    echo 'Area: ' . $shape->area() . '<br>';
}
?>
```