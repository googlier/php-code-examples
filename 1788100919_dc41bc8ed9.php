```php
<?php
abstract class Shape {
    abstract public function area();
}

class Circle extends Shape {
    protected $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function area() {
        return pi() * pow($this->radius, 2);
    }
}

class Rectangle extends Shape {
    protected $width;
    protected $height;

    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }

    public function area() {
        return $this->width * $this->height;
    }
}

class ShapeFactory {
    public static function createShape($type, $params) {
        switch ($type) {
            case 'circle':
                return new Circle($params['radius']);
            case 'rectangle':
                return new Rectangle($params['width'], $params['height']);
            default:
                throw new Exception("Unknown shape type");
        }
    }
}

$shapes = [
    ['type' => 'circle', 'radius' => 5],
    ['type' => 'rectangle', 'width' => 3, 'height' => 4]
];

$totalArea = 0;
foreach ($shapes as $shapeParams) {
    $shape = ShapeFactory::createShape($shapeParams['type'], $shapeParams);
    $totalArea += $shape->area();
}

echo "Total area: " . $totalArea;
?>
```