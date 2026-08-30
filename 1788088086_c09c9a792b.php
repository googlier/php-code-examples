```php
<?php
class Shape {
    public function draw() {
        echo "Drawing a shape...\n";
    }
}

class Circle extends Shape {
    public function draw() {
        echo "Drawing a circle...\n";
    }
}

class Square extends Shape {
    public function draw() {
        echo "Drawing a square...\n";
    }
}

class ShapeFactory {
    public static function getShape($shapeType) {
        if($shapeType == null) {
            return null;
        }
        if($shapeType == "CIRCLE") {
            return new Circle();
        } else if($shapeType == "SQUARE") {
            return new Square();
        }
        return null;
    }
}

$shapeFactory = new ShapeFactory();
$shape1 = $shapeFactory->getShape("CIRCLE");
$shape1->draw();

$shape2 = $shapeFactory->getShape("SQUARE");
$shape2->draw();
?>
```