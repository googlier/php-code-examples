```php
<?php

class Shape {
    abstract function draw();
}

class Circle extends Shape {
    public function draw() {
        echo "Drawing Circle\n";
    }
}

class Square extends Shape {
    public function draw() {
        echo "Drawing Square\n";
    }
}

class ShapeFactory {
    public static function getShape($shapeType) {
        switch($shapeType) {
            case "CIRCLE":
                return new Circle();
            case "SQUARE":
                return new Square();
            default:
                throw new Exception("Unknown Shape Type");
        }
    }
}

$shapeType = rand(0, 1) == 0 ? "CIRCLE" : "SQUARE";
$shape = ShapeFactory::getShape($shapeType);
$shape->draw();

?>
```