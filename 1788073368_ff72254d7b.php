```php
<?php

class Shape {
    public function draw() {
        echo "Drawing a shape";
    }
}

class Circle extends Shape {
    public function draw() {
        echo "Drawing a circle";
    }
}

class Square extends Shape {
    public function draw() {
        echo "Drawing a square";
    }
}

class Drawing {
    public function drawShape(Shape $shape) {
        $shape->draw();
    }
}

$factory = new class {
    public function getShape($shapeType) {
        switch ($shapeType) {
            case 'circle':
                return new Circle();
            case 'square':
                return new Square();
            default:
                return new Shape();
        }
    }
};

$drawing = new Drawing();
$drawing->drawShape($factory->getShape('circle'));
$drawing->drawShape($factory->getShape('square'));
$drawing->drawShape($factory->getShape('triangle'));

?>
```