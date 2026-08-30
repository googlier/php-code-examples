```php
<?php

class Shape {
    public function draw() {
        throw new Exception("This method should be overridden");
    }
}

class Circle implements Shape {
    public function draw() {
        echo "Drawing Circle";
    }
}

class Square implements Shape {
    public function draw() {
        echo "Drawing Square";
    }
}

class ShapeFactory {
    public static function getShape($shapeType) {
        if ($shapeType == "CIRCLE") {
            return new Circle();
        } else if ($shapeType == "SQUARE") {
            return new Square();
        } else {
            return null;
        }
    }
}

$shapeType = rand(1,2) == 1 ? "CIRCLE" : "SQUARE";
$shape = ShapeFactory::getShape($shapeType);
$shape->draw();

?>
```