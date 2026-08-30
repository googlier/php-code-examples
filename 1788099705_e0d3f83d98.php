```php
<?php
class Shape {
    protected $color;

    public function __construct($color) {
        $this->color = $color;
    }

    public function getColor() {
        return $this->color;
    }

    public function setColor($color) {
        $this->color = $color;
    }

    public abstract function area();
}

class Circle extends Shape {
    protected $radius;

    public function __construct($color, $radius) {
        parent::__construct($color);
        $this->radius = $radius;
    }

    public function getRadius() {
        return $this->radius;
    }

    public function setRadius($radius) {
        $this->radius = $radius;
    }

    public function area() {
        return M_PI * pow($this->radius, 2);
    }
}

class Rectangle extends Shape {
    protected $width;
    protected $height;

    public function __construct($color, $width, $height) {
        parent::__construct($color);
        $this->width = $width;
        $this->height = $height;
    }

    public function getWidth() {
        return $this->width;
    }

    public function setWidth($width) {
        $this->width = $width;
    }

    public function getHeight() {
        return $this->height;
    }

    public function setHeight($height) {
        $this->height = $height;
    }

    public function area() {
        return $this->width * $this->height;
    }
}

class ShapeFactory {
    public static function createShape($type, $color, ...$params) {
        switch ($type) {
            case 'circle':
                return new Circle($color, ...$params);
            case 'rectangle':
                return new Rectangle($color, ...$params);
            default:
                throw new Exception('Unknown shape type');
        }
    }
}

try {
    $circle = ShapeFactory::createShape('circle', 'red', 5);
    $rectangle = ShapeFactory::createShape('rectangle', 'blue', 3, 4);

    echo "Circle area: " . $circle->area() . "\n";
    echo "Rectangle area: " . $rectangle->area() . "\n";
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
```