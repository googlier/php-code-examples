```php
<?php
class Shape {
    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function area() {
        throw new Exception("Area method not implemented");
    }
}

class Circle extends Shape {
    protected $radius;

    public function __construct($name, $radius) {
        parent::__construct($name);
        $this->radius = $radius;
    }

    public function area() {
        return M_PI * pow($this->radius, 2);
    }
}

class Rectangle extends Shape {
    protected $width;
    protected $height;

    public function __construct($name, $width, $height) {
        parent::__construct($name);
        $this->width = $width;
        $this->height = $height;
    }

    public function area() {
        return $this->width * $this->height;
    }
}

class ShapeFactory {
    public static function getShape($type, $name, $params = []) {
        switch ($type) {
            case 'circle':
                return new Circle($name, $params['radius']);
            case 'rectangle':
                return new Rectangle($name, $params['width'], $params['height']);
            default:
                throw new Exception("Invalid shape type");
        }
    }
}

try {
    $circle = ShapeFactory::getShape('circle', 'Circle1', ['radius' => 5]);
    $rectangle = ShapeFactory::getShape('rectangle', 'Rectangle1', ['width' => 4, 'height' => 6]);

    echo "Area of {$circle->getName()}: " . $circle->area() . "\n";
    echo "Area of {$rectangle->getName()}: " . $rectangle->area() . "\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>
```