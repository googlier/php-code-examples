```php
<?php

class Shape {
    abstract public function draw();
}

class Circle implements Shape {
    public function draw() {
        echo "Drawing a circle";
    }
}

class Square implements Shape {
    public function draw() {
        echo "Drawing a square";
    }
}

class ShapeFactory {
    public static function getShape($shapeType) {
        if($shapeType == "CIRCLE"){
            return new Circle();
        } elseif($shapeType == "SQUARE"){
            return new Square();
        }
        return null;
    }
}

$shape = ShapeFactory::getShape("CIRCLE");
$shape->draw();

$shape = ShapeFactory::getShape("SQUARE");
$shape->draw();

?>
```