```php
<?php
class Shape {
    public function draw() {
        echo "Drawing a shape";
    }
}

class Circle extends Shape {
    public function draw() {
        echo "Drawing a circle";
    }
}

class Square extends Shape {
    public function draw() {
        echo "Drawing a square";
    }
}

class ShapeFactory {
    public static function getShape($shapeType) {
        switch($shapeType) {
            case "CIRCLE":
                return new Circle();
            case "SQUARE":
                return new Square();
            default:
                return new Shape();
        }
    }
}

$shapeType = "CIRCLE"; // Randomly choose CIRCLE or SQUARE
$shape = ShapeFactory::getShape($shapeType);
$shape->draw();
?>
```