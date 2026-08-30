```php
<?php

class Shape {
    abstract function draw();
}

class Circle extends Shape {
    function draw() {
        echo "Drawing a Circle\n";
    }
}

class Square extends Shape {
    function draw() {
        echo "Drawing a Square\n";
    }
}

class ShapeFactory {
    public static function getShape($shapeType) {
        if($shapeType == null){
            return null;
        }
        if($shapeType == "CIRCLE"){
            return new Circle();
        } else if($shapeType == "SQUARE"){
            return new Square();
        }
        return null;
    }
}

$shapeFactory = new ShapeFactory();

$shape1 = $shapeFactory->getShape("CIRCLE");
$shape1->draw();

$shape2 = $shapeFactory->getShape("SQUARE");
$shape2->draw();

?>
```