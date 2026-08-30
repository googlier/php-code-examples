```php
<?php

class Shape {
    public function draw() {
        throw new Exception("Method 'draw' must be implemented.");
    }
}

class Circle extends Shape {
    public function draw() {
        echo "Drawing a circle.";
    }
}

class Square extends Shape {
    public function draw() {
        echo "Drawing a square.";
    }
}

class ShapeFactory {
    public static function getShape($shapeType) {
        switch($shapeType) {
            case "circle":
                return new Circle();
            case "square":
                return new Square();
            default:
                throw new Exception("Unknown shape type.");
        }
    }
}

$shape = ShapeFactory::getShape("circle");
$shape->draw();

$shape = ShapeFactory::getShape("square");
$shape->draw();

?>
```