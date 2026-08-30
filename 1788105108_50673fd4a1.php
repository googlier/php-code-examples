```php
<?php

interface Shape {
    public function draw();
}

class Circle implements Shape {
    public function draw() {
        echo "Drawing Circle\n";
    }
}

class Rectangle implements Shape {
    public function draw() {
        echo "Drawing Rectangle\n";
    }
}

class ShapeFactory {
    public static function getShape($shapeType) {
        if ($shapeType == null) {
            return null;
        }
        if ($shapeType == "CIRCLE") {
            return new Circle();
        } else if ($shapeType == "RECTANGLE") {
            return new Rectangle();
        }
        return null;
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

class RedShapeDecorator extends ShapeDecorator {
    public function draw() {
        $this->shape->draw();
        echo "Drawing Red Color\n";
    }
}

$shapeFactory = new ShapeFactory();

$circle = $shapeFactory->getShape("CIRCLE");
$circle->draw();

$redCircle = new RedShapeDecorator($circle);
$redCircle->draw();

?>
```