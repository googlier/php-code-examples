```php
<?php
// Define the interface for a Shape
interface Shape {
    public function draw();
}

// Implement the Circle class
class Circle implements Shape {
    public function draw() {
        return "Drawing a Circle";
    }
}

// Implement the Square class
class Square implements Shape {
    public function draw() {
        return "Drawing a Square";
    }
}

// Implement the ShapeDecorator class as a decorator
class ShapeDecorator implements Shape {
    protected $shape;

    public function __construct(Shape $shape) {
        $this->shape = $shape;
    }

    public function draw() {
        return $this->shape->draw();
    }
}

// Implement the RedShapeDecorator as a concrete decorator
class RedShapeDecorator extends ShapeDecorator {
    public function draw() {
        return "Drawing a Red " . parent::draw();
    }
}

// Usage
$circle = new Circle();
$redCircle = new RedShapeDecorator($circle);

echo $redCircle->draw();
?>
```