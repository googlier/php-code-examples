```php
<?php

class Shape {
    abstract function draw();
}

class Circle extends Shape {
    public function draw() {
        echo "Drawing a Circle\n";
    }
}

class Square extends Shape {
    public function draw() {
        echo "Drawing a Square\n";
    }
}

class ShapeDecorator {
    protected $shape;

    public function __construct(Shape $shape) {
        $this->shape = $shape;
    }

    public function draw() {
        $this->shape->draw();
    }
}

class BorderDecorator extends ShapeDecorator {
    public function draw() {
        parent::draw();
        echo "Adding Border\n";
    }
}

class FillDecorator extends ShapeDecorator {
    public function draw() {
        parent::draw();
        echo "Filling Color\n";
    }
}

$circle = new Circle();
$borderedCircle = new BorderDecorator($circle);
$filledBorderedCircle = new FillDecorator($borderedCircle);

$circle->draw();
$borderedCircle->draw();
$filledBorderedCircle->draw();
?>
```