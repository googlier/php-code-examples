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
        switch ($shapeType) {
            case "circle":
                return new Circle();
            case "square":
                return new Square();
            default:
                return new Shape();
        }
    }
}

class Drawing {
    public function __construct($shapeType) {
        $shape = ShapeFactory::getShape($shapeType);
        $shape->draw();
    }
}

new Drawing("circle"); // Outputs: Drawing a circle
new Drawing("square"); // Outputs: Drawing a square
new Drawing("triangle"); // Outputs: Drawing a shape

?>
```