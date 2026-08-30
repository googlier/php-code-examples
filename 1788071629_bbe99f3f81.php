```php
<?php
class Shape {
    public function draw() {
        return "Drawing a shape";
    }
}

class Circle extends Shape {
    public function draw() {
        return "Drawing a circle";
    }
}

class Square extends Shape {
    public function draw() {
        return "Drawing a square";
    }
}

class ShapeFactory {
    public static function getShape($shapeType) {
        switch($shapeType) {
            case "circle":
                return new Circle();
            case "square":
                return new Square();
            default:
                return new Shape();
        }
    }
}

$shapeType = rand(0,1) ? "circle" : "square";
$shape = ShapeFactory::getShape($shapeType);
echo $shape->draw();
?>
```