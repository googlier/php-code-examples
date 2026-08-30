```php
<?php

// Define a random class implementing a design pattern
abstract class Shape {
    abstract function draw();
}

class Circle extends Shape {
    public function draw() {
        return "Drawing a Circle\n";
    }
}

class Square extends Shape {
    public function draw() {
        return "Drawing a Square\n";
    }
}

class ShapeFactory {
    public static function getShape($shapeType) {
        if ($shapeType == null) {
            return null;
        }
        if ($shapeType == "CIRCLE") {
            return new Circle();
        } else if ($shapeType == "SQUARE") {
            return new Square();
        }
        return null;
    }
}

// Generate a random shape type
$shapeType = mt_rand(1, 2) == 1 ? "CIRCLE" : "SQUARE";

// Get shape from factory
$shape = ShapeFactory::getShape($shapeType);

// Draw the shape
echo $shape->draw();

?>
```