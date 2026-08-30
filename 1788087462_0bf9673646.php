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
        switch($shapeType) {
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
$shape1 = $factory->getShape('circle');
$shape1->draw();

$shape2 = $factory->getShape('square');
$shape2->draw();

$shape3 = $factory->getShape('triangle');
$shape3->draw();

?>
```