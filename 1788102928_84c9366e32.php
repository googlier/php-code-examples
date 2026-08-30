```php
<?php

class Shape {
    abstract public function draw();
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

$shape1 = ShapeFactory::getShape("CIRCLE");
echo $shape1->draw() . "<br>";

$shape2 = ShapeFactory::getShape("SQUARE");
echo $shape2->draw() . "<br>";

?>
```