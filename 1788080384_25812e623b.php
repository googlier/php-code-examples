```php
<?php

class Shape {
    public function draw() {
        echo "Drawing a shape";
    }
}

class Circle extends Shape {
    public function draw() {
        echo "Drawing a circle";
    }
}

class Square extends Shape {
    public function draw() {
        echo "Drawing a square";
    }
}

class ShapeFactory {
    public static function getShape($shapeType) {
        if ($shapeType == null) {
            return null;
        }
        switch ($shapeType) {
            case 'CIRCLE':
                return new Circle();
            case 'SQUARE':
                return new Square();
            default:
                return null;
        }
    }
}

$shapeType = rand(1, 2);
$shape = ShapeFactory::getShape($shapeType == 1 ? 'CIRCLE' : 'SQUARE');
$shape->draw();

?>
```