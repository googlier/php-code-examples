```php
<?php

// Define an interface for a shape
interface Shape {
    public function area(): float;
}

// Define a class for a rectangle that implements the Shape interface
class Rectangle implements Shape {
    private $width;
    private $height;

    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }

    public function area(): float {
        return $this->width * $this->height;
    }
}

// Define a class for a circle that implements the Shape interface
class Circle implements Shape {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function area(): float {
        return pi() * pow($this->radius, 2);
    }
}

// Define a class for a shape calculator that uses the Strategy design pattern
class ShapeCalculator {
    private $shape;

    public function __construct(Shape $shape) {
        $this->shape = $shape;
    }

    public function calculateArea(): float {
        return $this->shape->area();
    }
}

// Create a rectangle and a circle
$rectangle = new Rectangle(5, 10);
$circle = new Circle(7);

// Create a shape calculator for the rectangle and calculate its area
$rectangleCalculator = new ShapeCalculator($rectangle);
echo "Area of rectangle: " . $rectangleCalculator->calculateArea() . "<br>";

// Create a shape calculator for the circle and calculate its area
$circleCalculator = new ShapeCalculator($circle);
echo "Area of circle: " . $circleCalculator->calculateArea() . "<br>";

?>
```