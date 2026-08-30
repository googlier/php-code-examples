```php
<?php
abstract class Shape {
    abstract function area();
}

class Circle extends Shape {
    protected $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function area() {
        return M_PI * $this->radius * $this->radius;
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

class ShapeDecorator {
    protected $shape;

    public function __construct(Shape $shape) {
        $this->shape = $shape;
    }

    public function getShape() {
        return $this->shape;
    }
}

class ColorDecorator extends ShapeDecorator {
    protected $color;

    public function __construct(Shape $shape, $color) {
        parent::__construct($shape);
        $this->color = $color;
    }

    public function area() {
        return $this->getShape()->area();
    }

    public function getColor() {
        return $this->color;
    }
}

$circle = new Circle(5);
$colorCircle = new ColorDecorator($circle, "red");
echo "Area of circle: " . $colorCircle->area() . " Color: " . $colorCircle->getColor() . "\n";

$rectangle = new Rectangle(4, 6);
$colorRectangle = new ColorDecorator($rectangle, "blue");
echo "Area of rectangle: " . $colorRectangle->area() . " Color: " . $colorRectangle->getColor() . "\n";
?>
```