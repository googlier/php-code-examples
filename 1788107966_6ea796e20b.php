```php
<?php

class Shape {
    public function draw() {
        echo "Drawing a shape.\n";
    }
}

class Circle extends Shape {
    public function draw() {
        echo "Drawing a circle.\n";
    }
}

class Square extends Shape {
    public function draw() {
        echo "Drawing a square.\n";
    }
}

class ShapeFactory {
    public static function getShape($shapeType) {
        if ($shapeType == "circle") {
            return new Circle();
        } else if ($shapeType == "square") {
            return new Square();
        } else {
            return new Shape();
        }
    }
}

$shape1 = ShapeFactory::getShape("circle");
$shape1->draw();

$shape2 = ShapeFactory::getShape("square");
$shape2->draw();

$shape3 = ShapeFactory::getShape("triangle");
$shape3->draw();
?>
```