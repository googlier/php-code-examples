```php
<?php

class Shape {
    abstract function draw();
}

class Circle extends Shape {
    function draw() {
        echo "Drawing a Circle\n";
    }
}

class Square extends Shape {
    function draw() {
        echo "Drawing a Square\n";
    }
}

class ShapeFactory {
    static function getShape($shapeType) {
        if ($shapeType == "CIRCLE") {
            return new Circle();
        } else if ($shapeType == "SQUARE") {
            return new Square();
        }
        return null;
    }
}

$shapeType = rand(0, 1) == 0 ? "CIRCLE" : "SQUARE";
$shape = ShapeFactory::getShape($shapeType);
$shape->draw();

?>
```