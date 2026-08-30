```php
<?php

class Shape {
    public function draw() {
        echo "Drawing a shape";
    }
}

class Circle extends Shape {
    public function draw() {
        echo "Drawing a circle";
    }
}

class Square extends Shape {
    public function draw() {
        echo "Drawing a square";
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

$shapeType = rand(0, 2);
$shapes = ["CIRCLE", "SQUARE", "SHAPE"];
$shape = ShapeFactory::getShape($shapes[$shapeType]);
$shape->draw();

?>
```