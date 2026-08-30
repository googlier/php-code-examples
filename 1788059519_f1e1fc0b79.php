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

$shape1 = ShapeFactory::getShape('circle');
$shape1->draw();

$shape2 = ShapeFactory::getShape('square');
$shape2->draw();
?>
```