```php
<?php

interface Shape {
    public function draw();
}

class Circle implements Shape {
    public function draw() {
        return "Drawing a Circle\n";
    }
}

class Square implements Shape {
    public function draw() {
        return "Drawing a Square\n";
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

$shape1 = ShapeFactory::getShape("CIRCLE");
echo $shape1->draw();

$shape2 = ShapeFactory::getShape("SQUARE");
echo $shape2->draw();

?>
```