```php
<?php

class Shape {
    abstract function draw();
}

class Circle extends Shape {
    function draw() {
        echo "Drawing Circle";
    }
}

class Square extends Shape {
    function draw() {
        echo "Drawing Square";
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

?>
```