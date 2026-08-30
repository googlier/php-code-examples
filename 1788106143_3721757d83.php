```php
<?php
abstract class Shape {
    abstract public function draw();
}

class Circle extends Shape {
    public function draw() {
        echo "Drawing Circle\n";
    }
}

class Square extends Shape {
    public function draw() {
        echo "Drawing Square\n";
    }
}

class ShapeFactory {
    public static function getShape($shapeType) {
        if($shapeType == null) {
            return null;
        }
        if($shapeType == "CIRCLE") {
            return new Circle();
        } elseif($shapeType == "SQUARE") {
            return new Square();
        }
        return null;
    }
}

$shape = ShapeFactory::getShape($_GET['shape']);
$shape->draw();
?>
```