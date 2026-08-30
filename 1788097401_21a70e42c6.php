```php
<?php
class Shape {
    abstract function area();
}

class Rectangle implements Shape {
    private $width;
    private $height;

    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }

    public function area() {
        return $this->width * $this->height;
    }
}

class Circle implements Shape {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function area() {
        return M_PI * pow($this->radius, 2);
    }
}

class ShapeFactory {
    public static function createShape($type, $params) {
        switch ($type) {
            case 'Rectangle':
                return new Rectangle($params['width'], $params['height']);
            case 'Circle':
                return new Circle($params['radius']);
            default:
                throw new Exception('Unknown shape type');
        }
    }
}

$params = [
    'width' => 5,
    'height' => 10
];
$rectangle = ShapeFactory::createShape('Rectangle', $params);
echo 'Area of Rectangle: ' . $rectangle->area() . PHP_EOL;

$params = [
    'radius' => 3
];
$circle = ShapeFactory::createShape('Circle', $params);
echo 'Area of Circle: ' . $circle->area() . PHP_EOL;
?>
```