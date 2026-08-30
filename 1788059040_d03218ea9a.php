```php
<?php
class Shape {
    abstract public function draw();
}

class Circle extends Shape {
    public function draw() {
        return "Drawing Circle";
    }
}

class Square extends Shape {
    public function draw() {
        return "Drawing Square";
    }
}

class ShapeDecorator {
    protected $shape;

    public function __construct(Shape $shape) {
        $this->shape = $shape;
    }

    public function draw() {
        return $this->shape->draw();
    }
}

class BorderDecorator extends ShapeDecorator {
    public function draw() {
        return "Border: " . parent::draw();
    }
}

class ColorDecorator extends ShapeDecorator {
    public function draw() {
        return "Color: " . parent::draw();
    }
}

$circle = new Circle();
$borderCircle = new BorderDecorator($circle);
$coloredBorderCircle = new ColorDecorator($borderCircle);

echo $coloredBorderCircle->draw();
?>
```