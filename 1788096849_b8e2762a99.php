```php
<?php

class Shape {
    abstract function draw();
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
        if ($shapeType == null) {
            return null;
        }
        switch ($shapeType) {
            case "CIRCLE":
                return new Circle();
            case "SQUARE":
                return new Square();
            default:
                return null;
        }
    }
}

$shapeType = rand(0, 1) == 0 ? "CIRCLE" : "SQUARE";
$shape = ShapeFactory::getShape($shapeType);
if ($shape != null) {
    $shape->draw();
}
?>
```