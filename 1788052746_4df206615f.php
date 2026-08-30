```php
<?php
class Shape {
    public function draw() {
        throw new Exception("This method should be overridden by subclasses");
    }
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
        if($shapeType == "CIRCLE") {
            return new Circle();
        } elseif($shapeType == "SQUARE") {
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