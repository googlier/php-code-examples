```php
<?php
class Shape {
    abstract function draw();
}

class Circle extends Shape {
    function draw() {
        return "Drawing a Circle";
    }
}

class Square extends Shape {
    function draw() {
        return "Drawing a Square";
    }
}

class ShapeFactory {
    function getShape($shapeType) {
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

$shapeFactory = new ShapeFactory();
$shape1 = $shapeFactory->getShape("CIRCLE");
echo $shape1->draw() . "\n";

$shape2 = $shapeFactory->getShape("SQUARE");
echo $shape2->draw() . "\n";
?>
```