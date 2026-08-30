```php
<?php
class Shape {
    abstract public function draw();
}

interface Color {
    public function fill();
}

class Circle implements Shape {
    public function draw() {
        echo "Drawing Circle\n";
    }
}

class Square implements Shape {
    public function draw() {
        echo "Drawing Square\n";
    }
}

class RedColor implements Color {
    public function fill() {
        echo "Filling with Red\n";
    }
}

class BlueColor implements Color {
    public function fill() {
        echo "Filling with Blue\n";
    }
}

class ShapeDecorator implements Shape {
    protected $shape;

    public function __construct(Shape $shape) {
        $this->shape = $shape;
    }

    public function draw() {
        $this->shape->draw();
    }
}

class ColorDecorator implements Color {
    protected $color;

    public function __construct(Color $color) {
        $this->color = $color;
    }

    public function fill() {
        $this->color->fill();
    }
}

class ColoredShapeDecorator extends ShapeDecorator {
    protected $color;

    public function __construct(Shape $shape, Color $color) {
        parent::__construct($shape);
        $this->color = $color;
    }

    public function draw() {
        $this->color->fill();
        parent::draw();
    }
}

$shape = new Circle();
$shape = new ColoredShapeDecorator($shape, new RedColor());
$shape->draw();
?>
```