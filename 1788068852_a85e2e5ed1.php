```php
<?php

class Shape {
    public function draw() {
        echo "Drawing a Shape\n";
    }
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

class ShapeFactory {
    public static function getShape($shapeType) {
        if ($shapeType == null) {
            return null;
        }
        switch ($shapeType) {
            case "CIRCLE":
                return new Circle();
            case "SQUARE":
                return new Square();
            default:
                return null;
        }
    }
}

$shape1 = ShapeFactory::getShape("CIRCLE");
$shape1->draw();

$shape2 = ShapeFactory::getShape("SQUARE");
$shape2->draw();

?>
```