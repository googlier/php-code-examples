```php
<?php

class Shape {
    abstract public function draw();
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
        if ($shapeType == null) {
            return null;
        }
        if ($shapeType == "CIRCLE") {
            return new Circle();
        } else if ($shapeType == "SQUARE") {
            return new Square();
        }
        return null;
    }
}

$client = new class {
    public function request($shapeType) {
        $shape = ShapeFactory::getShape($shapeType);
        if ($shape != null) {
            $shape->draw();
        } else {
            echo "Shape not found\n";
        }
    }
};

$client->request("CIRCLE");
$client->request("SQUARE");
$client->request("TRIANGLE");
?>
```