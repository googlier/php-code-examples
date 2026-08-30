```php
<?php

class Shape {
    public function draw() {
        throw new Exception("This method should be overridden.");
    }
}

class Circle implements Shape {
    public function draw() {
        echo "Drawing a Circle.";
    }
}

class Square implements Shape {
    public function draw() {
        echo "Drawing a Square.";
    }
}

class ShapeFactory {
    public function getShape($shapeType) {
        if ($shapeType == "CIRCLE") {
            return new Circle();
        } elseif ($shapeType == "SQUARE") {
            return new Square();
        }
        return null;
    }
}

$factory = new ShapeFactory();
$shape1 = $factory->getShape("CIRCLE");
$shape1->draw();
$shape2 = $factory->getShape("SQUARE");
$shape2->draw();

?>
```