```php
<?php
class Shape {
    abstract function draw();
}

class Circle implements Shape {
    public function draw() {
        echo "Drawing a Circle\n";
    }
}

class Square implements Shape {
    public function draw() {
        echo "Drawing a Square\n";
    }
}

class ShapeFactory {
    public function getShape($shapeType) {
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
$shape1->draw();

$shape2 = $shapeFactory->getShape("SQUARE");
$shape2->draw();
?>
```