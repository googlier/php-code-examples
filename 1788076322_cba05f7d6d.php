```php
<?php

class Shape {
    abstract public function draw();
}

class Circle extends Shape {
    public function draw() {
        return "Drawing Circle";
    }
}

class Square extends Shape {
    public function draw() {
        return "Drawing Square";
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

$shapeType = rand(0, 1) == 0 ? "CIRCLE" : "SQUARE";
$shape = ShapeFactory::getShape($shapeType);

if ($shape != null) {
    echo $shape->draw();
} else {
    echo "Unknown Shape";
}
?>
```