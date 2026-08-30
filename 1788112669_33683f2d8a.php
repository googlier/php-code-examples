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
    public static function createShape($type, $params) {
        if ($type == 'Circle') {
            return new Circle($params['radius']);
        } elseif ($type == 'Square') {
            return new Square($params['side']);
        } else {
            throw new Exception("Unknown shape type");
        }
    }
}

$factory = new ShapeFactory();
$shapes = [
    'Circle' => ['radius' => 5],
    'Square' => ['side' => 4]
];

foreach ($shapes as $type => $params) {
    try {
        $shape = $factory->createShape($type, $params);
        echo "Area of $type: " . $shape->area() . "<br>";
    } catch (Exception $e) {
        echo $e->getMessage() . "<br>";
    }
}
?>
```