```php
<?php
class Shape {
    abstract function area();
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
    public function draw() {
        echo $this->shape->area();
    }
}

class ColoredShapeDecorator extends ShapeDecorator {
    private $color;
    public function __construct(Shape $shape, $color) {
        parent::__construct($shape);
        $this->color = $color;
    }
    public function draw() {
        echo "<div style='color:{$this->color}'>{$this->shape->area()}</div>";
    }
}

$circle = new Circle(5);
$decoratedCircle = new ColoredShapeDecorator($circle, 'red');
$decoratedCircle->draw();
?>
```