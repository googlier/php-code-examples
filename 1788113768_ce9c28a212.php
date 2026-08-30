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

class ShapeDecorator {
    protected $shape;

    public function __construct(Shape $shape) {
        $this->shape = $shape;
    }

    public function area() {
        return $this->shape->area();
    }
}

class BorderDecorator extends ShapeDecorator {
    public function area() {
        $baseArea = parent::area();
        return $baseArea + 4; // Assuming border width is 1 unit
    }
}

$circle = new Circle(5);
$rectangle = new Rectangle(4, 6);

$circleWithBorder = new BorderDecorator($circle);
$rectangleWithBorder = new BorderDecorator($rectangle);

echo "Circle Area: " . $circleWithBorder->area() . "\n";
echo "Rectangle Area: " . $rectangleWithBorder->area() . "\n";
?>
```