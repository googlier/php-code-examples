```php
<?php

class Shape {
    public function draw() {
        echo "Drawing a Shape";
    }
}

class Circle extends Shape {
    public function draw() {
        echo "Drawing a Circle";
    }
}

class Square extends Shape {
    public function draw() {
        echo "Drawing a Square";
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

$shape = ShapeFactory::getShape("CIRCLE");
$shape->draw();

$shape = ShapeFactory::getShape("SQUARE");
$shape->draw();

?>
```