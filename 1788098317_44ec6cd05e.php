```php
<?php

class Shape {
    abstract function draw();
}

class Circle implements Shape {
    public function draw() {
        echo "Drawing a Circle";
    }
}

class Square implements Shape {
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

$shapeType = rand(0, 1) ? "CIRCLE" : "SQUARE";
$shape = ShapeFactory::getShape($shapeType);
$shape->draw();

?>
```