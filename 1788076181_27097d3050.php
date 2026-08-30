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
        if ($shapeType == "CIRCLE") {
            return new Circle();
        } elseif ($shapeType == "SQUARE") {
            return new Square();
        } else {
            return new Shape();
        }
    }
}

$shape1 = ShapeFactory::getShape("CIRCLE");
$shape1->draw();

$shape2 = ShapeFactory::getShape("SQUARE");
$shape2->draw();

$shape3 = ShapeFactory::getShape("TRIANGLE");
$shape3->draw();
?>
```