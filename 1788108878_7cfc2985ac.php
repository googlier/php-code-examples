```php
<?php
class Shape {
    public function draw() {
        throw new Exception("This method should be overridden by subclasses");
    }
}

class Circle extends Shape {
    public function draw() {
        return "Drawing a Circle";
    }
}

class Square extends Shape {
    public function draw() {
        return "Drawing a Square";
    }
}

class ShapeFactory {
    public static function getShape($shapeType) {
        if ($shapeType == null) {
            return null;
        }
        switch ($shapeType) {
            case "CIRCLE":
                return new Circle();
            case "SQUARE":
                return new Square();
            default:
                throw new Exception("Unknown Shape type");
        }
    }
}

$shape1 = ShapeFactory::getShape("CIRCLE");
echo $shape1->draw() . "\n";

$shape2 = ShapeFactory::getShape("SQUARE");
echo $shape2->draw() . "\n";
?>
```