```php
<?php
class Shape {
    abstract public function draw();
}

class Circle extends Shape {
    public function draw() {
        echo "Drawing a circle\n";
    }
}

class Square extends Shape {
    public function draw() {
        echo "Drawing a square\n";
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

$shapeType = rand(0, 1) ? "CIRCLE" : "SQUARE";
$shape = ShapeFactory::getShape($shapeType);
$shape->draw();
?>
```