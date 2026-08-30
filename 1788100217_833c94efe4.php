```php
<?php
class Shape {
    abstract function draw();
}

class Circle extends Shape {
    function draw() {
        echo "Drawing Circle\n";
    }
}

class Square extends Shape {
    function draw() {
        echo "Drawing Square\n";
    }
}

class ShapeFactory {
    static function getShape($shapeType) {
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
$shape1->draw();

$shape2 = ShapeFactory::getShape("SQUARE");
$shape2->draw();
?>
```