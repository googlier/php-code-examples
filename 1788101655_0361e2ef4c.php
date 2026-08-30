```php
<?php
class Shape {
    public function draw() {
        return "Drawing a Shape";
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
echo $shape->draw();
?>
```