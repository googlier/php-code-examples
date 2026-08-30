```php
<?php
class Shape {
    public function draw() {}
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
        if ($shapeType == "CIRCLE") {
            return new Circle();
        } elseif ($shapeType == "SQUARE") {
            return new Square();
        }
        return null;
    }
}

class ShapeDrawer {
    public function drawShape($shapeType) {
        $shape = ShapeFactory::getShape($shapeType);
        if ($shape != null) {
            $shape->draw();
        } else {
            echo "Invalid shape type\n";
        }
    }
}

$drawer = new ShapeDrawer();
$drawer->drawShape("CIRCLE");
$drawer->drawShape("SQUARE");
?>
```