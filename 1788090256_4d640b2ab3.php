```php
<?php
class Shape {
    protected $color;
    public function __construct($color) {
        $this->color = $color;
    }
    public function draw() {
        echo "Drawing a shape with color: " . $this->color . "<br>";
    }
}

class Circle extends Shape {
    public function __construct($color) {
        parent::__construct($color);
    }
    public function draw() {
        echo "Drawing a circle with color: " . $this->color . "<br>";
    }
}

class Square extends Shape {
    public function __construct($color) {
        parent::__construct($color);
    }
    public function draw() {
        echo "Drawing a square with color: " . $this->color . "<br>";
    }
}

class ShapeFactory {
    public static function getShape($shapeType, $color) {
        if ($shapeType == "circle") {
            return new Circle($color);
        } elseif ($shapeType == "square") {
            return new Square($color);
        } else {
            return new Shape($color);
        }
    }
}

$shape1 = ShapeFactory::getShape("circle", "red");
$shape1->draw();

$shape2 = ShapeFactory::getShape("square", "blue");
$shape2->draw();

$shape3 = ShapeFactory::getShape("triangle", "green");
$shape3->draw();
?>
```