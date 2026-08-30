```php
<?php

class Shape {
    abstract public function draw();
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
        if ($shapeType == "CIRCLE") {
            return new Circle();
        } elseif ($shapeType == "SQUARE") {
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