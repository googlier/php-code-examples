```php
<?php

interface Shape {
    public function draw();
}

class Circle implements Shape {
    public function draw() {
        echo "Drawing Circle\n";
    }
}

class Square implements Shape {
    public function draw() {
        echo "Drawing Square\n";
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

$shapeFactory = new ShapeFactory();

$shape1 = $shapeFactory->getShape("CIRCLE");
$shape1->draw();

$shape2 = $shapeFactory->getShape("SQUARE");
$shape2->draw();
?>
```