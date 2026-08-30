```php
<?php

class Shape {
    public function draw() {
        throw new Exception("This method should be overridden");
    }
}

class Circle implements Shape {
    public function draw() {
        echo "Drawing a circle\n";
    }
}

class Square implements Shape {
    public function draw() {
        echo "Drawing a square\n";
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

$shapeType = "CIRCLE";
$shape = ShapeFactory::getShape($shapeType);
$shape->draw();

$shapeType = "SQUARE";
$shape = ShapeFactory::getShape($shapeType);
$shape->draw();

?>
```