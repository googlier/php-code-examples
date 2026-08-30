```php
<?php

class Shape {
    public function draw() {
        echo "Drawing a shape\n";
    }
}

class Circle extends Shape {
    public function draw() {
        echo "Drawing a circle\n";
    }
}

class Square extends Shape {
    public function draw() {
        echo "Drawing a square\n";
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

class DrawingApplication {
    public function drawShape($shapeType) {
        $shape = ShapeFactory::getShape($shapeType);
        if ($shape != null) {
            $shape->draw();
        } else {
            echo "Unknown shape type\n";
        }
    }
}

$app = new DrawingApplication();
$app->drawShape("CIRCLE");
$app->drawShape("SQUARE");
$app->drawShape("TRIANGLE");
?>
```