```php
<?php
class Shape {
    abstract function draw();
}

class Circle implements Shape {
    public function draw() {
        echo "Drawing Circle";
    }
}

class Square implements Shape {
    public function draw() {
        echo "Drawing Square";
    }
}

class ShapeFactory {
    public function getShape($shapeType) {
        if ($shapeType == "CIRCLE") {
            return new Circle();
        } elseif ($shapeType == "SQUARE") {
            return new Square();
        }
        return null;
    }
}

$factory = new ShapeFactory();
$shape = $factory->getShape("CIRCLE");
$shape->draw();
?>
```