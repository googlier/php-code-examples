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

$shapeType = array("circle", "square", "triangle")[rand(0, 2)];
$shape = ShapeFactory::getShape($shapeType);
echo $shape->draw();
?>
```