```php
<?php

class Shape {
    public function draw() {
        throw new Exception("Method 'draw' not implemented.");
    }
}

class Circle implements Shape {
    public function draw() {
        echo "Drawing a Circle\n";
    }
}

class Square implements Shape {
    public function draw() {
        echo "Drawing a Square\n";
    }
}

class ShapeDrawer {
    private $shape;

    public function __construct(Shape $shape) {
        $this->shape = $shape;
    }

    public function drawShape() {
        $this->shape->draw();
    }
}

$shapes = [
    new Circle(),
    new Square()
];

foreach ($shapes as $shape) {
    $drawer = new ShapeDrawer($shape);
    $drawer->drawShape();
}
?>
```