```php
<?php
class Shape {
    public function draw() {}
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
    public static function createShape($shapeType) {
        switch($shapeType) {
            case 'circle':
                return new Circle();
            case 'square':
                return new Square();
            default:
                throw new InvalidArgumentException("Unknown shape type");
        }
    }
}

$factory = new ShapeFactory();
$shape = $factory->createShape('circle');
$shape->draw();

$shape = $factory->createShape('square');
$shape->draw();
?>
```