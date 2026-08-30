```php
<?php
class Shape {
    abstract public function draw();
}

interface Drawable {
    public function display();
}

class Circle extends Shape implements Drawable {
    public function draw() {
        echo "Drawing a Circle\n";
    }

    public function display() {
        echo "Displaying a Circle\n";
    }
}

class Square extends Shape implements Drawable {
    public function draw() {
        echo "Drawing a Square\n";
    }

    public function display() {
        echo "Displaying a Square\n";
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

class ShapeDecorator implements Drawable {
    protected $shape;

    public function __construct(Shape $shape) {
        $this->shape = $shape;
    }

    public function display() {
        $this->shape->display();
    }
}

class RedShapeDecorator extends ShapeDecorator {
    public function display() {
        $this->shape->display();
        echo "Adding Red Color\n";
    }
}

$shape1 = ShapeFactory::getShape("CIRCLE");
$shape1->draw();
$redCircle = new RedShapeDecorator($shape1);
$redCircle->display();

$shape2 = ShapeFactory::getShape("SQUARE");
$shape2->draw();
$redSquare = new RedShapeDecorator($shape2);
$redSquare->display();
?>
```