```php
<?php
class Shape {
    public function draw() {
        throw new Exception("This method should be overridden");
    }
}

class Circle implements Shape {
    public function draw() {
        echo "Drawing a Circle\n";
    }
}

class Square implements Shape {
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

class ShapeDemo {
    public static function main() {
        $shapeFactory = new ShapeFactory();

        $shape1 = $shapeFactory->getShape("CIRCLE");
        $shape1->draw();

        $shape2 = $shapeFactory->getShape("SQUARE");
        $shape2->draw();
    }
}

ShapeDemo::main();
?>
```