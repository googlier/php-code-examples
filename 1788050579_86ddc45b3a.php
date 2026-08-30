```php
<?php

// Define a class that implements a design pattern
interface Shape {
    public function draw();
}

// Concrete class implementing the Shape interface
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

// Context class
class ShapeContext {
    private $shape;

    public function __construct(Shape $shape) {
        $this->shape = $shape;
    }

    public function setShape(Shape $shape) {
        $this->shape = $shape;
    }

    public function drawShape() {
        $this->shape->draw();
    }
}

// Client code
$shapeContext = new ShapeContext(new Circle());
$shapeContext->drawShape();

$shapeContext->setShape(new Square());
$shapeContext->drawShape();

?>
```