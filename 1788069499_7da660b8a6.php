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
    public function getShape($shapeType) {
        switch ($shapeType) {
            case 'circle':
                return new Circle();
            case 'square':
                return new Square();
            default:
                return new Shape();
        }
    }
}

$factory = new ShapeFactory();
$circle = $factory->getShape('circle');
$circle->draw();

$square = $factory->getShape('square');
$square->draw();

?>
```