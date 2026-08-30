```php
<?php
class Shape {
    public function draw() {
        throw new Exception("Method 'draw' must be implemented.");
    }
}

class Circle extends Shape {
    public function draw() {
        echo "Drawing a Circle\n";
    }
}

class Square extends Shape {
    public function draw() {
        echo "Drawing a Square\n";
    }
}

class ShapeFactory {
    public static function getShape($shapeType) {
        if($shapeType == null) {
            return null;
        }
        if($shapeType == "CIRCLE") {
            return new Circle();
        } else if($shapeType == "SQUARE") {
            return new Square();
        }
        return null;
    }
}

$shapeType = rand(1, 2);
if($shapeType == 1) {
    $shape = ShapeFactory::getShape("CIRCLE");
} else {
    $shape = ShapeFactory::getShape("SQUARE");
}

$shape->draw();
?>
```