```php
<?php
class Shape {
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

$factory = new ShapeFactory();
$shape1 = $factory->getShape("CIRCLE");
$shape1->draw();

$shape2 = $factory->getShape("SQUARE");
$shape2->draw();
?>
```