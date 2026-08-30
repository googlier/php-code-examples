```php
<?php
class Shape {
    public function draw() {
        echo "Drawing a shape...\n";
    }
}

class Circle extends Shape {
    public function draw() {
        echo "Drawing a Circle...\n";
    }
}

class Square extends Shape {
    public function draw() {
        echo "Drawing a Square...\n";
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

$shapeType = "CIRCLE";
$shape = ShapeFactory::getShape($shapeType);
$shape->draw();

$shapeType = "SQUARE";
$shape = ShapeFactory::getShape($shapeType);
$shape->draw();
?>
```