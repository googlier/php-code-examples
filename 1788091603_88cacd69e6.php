```php
<?php

// Define a class that implements a Factory Design Pattern for creating different types of shapes
class ShapeFactory {
    public static function getShape($shapeType) {
        if ($shapeType == "CIRCLE") {
            return new Circle();
        } elseif ($shapeType == "SQUARE") {
            return new Square();
        } else {
            return null;
        }
    }
}

// Define an interface for shapes
interface Shape {
    function draw();
}

// Implement the interface for Circle
class Circle implements Shape {
    public function draw() {
        echo "Drawing Circle";
    }
}

// Implement the interface for Square
class Square implements Shape {
    public function draw() {
        echo "Drawing Square";
    }
}

// Usage
$shape = ShapeFactory::getShape("CIRCLE");
$shape->draw();

$shape = ShapeFactory::getShape("SQUARE");
$shape->draw();

?>
```