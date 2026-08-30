```php
<?php
class Shape {
    public function draw() {
        echo "Drawing a shape";
    }
}

class Circle extends Shape {
    public function draw() {
        echo "Drawing a Circle";
    }
}

class Square extends Shape {
    public function draw() {
        echo "Drawing a Square";
    }
}

class ShapeFactory {
    public static function getShape($shapeType) {
        if ($shapeType == "CIRCLE") {
            return new Circle();
        } elseif ($shapeType == "SQUARE") {
            return new Square();
        }
        return new Shape();
    }
}

$shape1 = ShapeFactory::getShape("CIRCLE");
$shape1->draw();

$shape2 = ShapeFactory::getShape("SQUARE");
$shape2->draw();
?>
```