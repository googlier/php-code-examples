```php
<?php

interface Shape {
    public function draw();
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
    public function getShape($shapeType) {
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

class Application {
    public function run() {
        $factory = new ShapeFactory();
        $shape1 = $factory->getShape("CIRCLE");
        $shape2 = $factory->getShape("SQUARE");

        $shape1->draw();
        $shape2->draw();
    }
}

$app = new Application();
$app->run();

?>
```