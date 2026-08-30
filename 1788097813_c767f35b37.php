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
        return M_PI * pow($this->radius, 2);
    }
}

class Rectangle extends Shape {
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

class ShapeFactory {
    public static function create($type, ...$args) {
        $class = __NAMESPACE__ . '\\' . ucfirst($type);
        return new $class(...$args);
    }
}

$shapes = [
    ShapeFactory::create('Circle', 5),
    ShapeFactory::create('Rectangle', 4, 6)
];

foreach ($shapes as $shape) {
    echo $shape->area() . "\n";
}
?>
```