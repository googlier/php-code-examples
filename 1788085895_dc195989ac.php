```php
<?php
class Shape {
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
        switch ($shapeType) {
            case "CIRCLE":
                return new Circle();
            case "SQUARE":
                return new Square();
            default:
                return null;
        }
    }
}

$factory = new ShapeFactory();
$circle = $factory->getShape("CIRCLE");
$circle->draw();

$square = $factory->getShape("SQUARE");
$square->draw();
?>
```