```php
<?php

class Shape {
    public function draw() {
        throw new Exception("This method should be overridden");
    }
}

class Circle extends Shape {
    public function draw() {
        return "Drawing a Circle";
    }
}

class Square extends Shape {
    public function draw() {
        return "Drawing a Square";
    }
}

class ShapeFactory {
    public static function getShape($shapeType) {
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

$shape = ShapeFactory::getShape("CIRCLE");
echo $shape->draw(); // Drawing a Circle

$shape = ShapeFactory::getShape("SQUARE");
echo $shape->draw(); // Drawing a Square

?>
```