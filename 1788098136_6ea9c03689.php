```php
<?php
class Shape {
    public function draw() {
        echo "Drawing a shape\n";
    }
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
        if($shapeType == "CIRCLE") {
            return new Circle();
        } elseif($shapeType == "SQUARE") {
            return new Square();
        } else {
            return new Shape();
        }
    }
}

$shapeType = rand(0, 1) ? "CIRCLE" : "SQUARE";
$shape = ShapeFactory::getShape($shapeType);
$shape->draw();
?>
```