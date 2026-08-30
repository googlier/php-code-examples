```php
<?php

class Shape {
    public function draw() {
        return "Drawing a shape";
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
    public function getShape($shapeType) {
        if ($shapeType == null) {
            return null;
        }
        if ($shapeType == "CIRCLE") {
            return new Circle();
        } elseif ($shapeType == "SQUARE") {
            return new Square();
        }
        return null;
    }
}

$shapeFactory = new ShapeFactory();

$shape1 = $shapeFactory->getShape("CIRCLE");
echo $shape1->draw() . "<br>";

$shape2 = $shapeFactory->getShape("SQUARE");
echo $shape2->draw() . "<br>";
?>
```