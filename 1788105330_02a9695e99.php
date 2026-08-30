```php
<?php
abstract class Shape {
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
        if ($shapeType == "CIRCLE") {
            return new Circle();
        }
        if ($shapeType == "SQUARE") {
            return new Square();
        }
        return null;
    }
}

$shapeType = "CIRCLE";
$shape = ShapeFactory::getShape($shapeType);
$shape->draw();

$shapeType = "SQUARE";
$shape = ShapeFactory::getShape($shapeType);
$shape->draw();
?>
```