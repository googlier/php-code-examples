```php
<?php
// Problem: Create a function to calculate the area of a rectangle given its width and height. Then, extend this function to handle different shapes like circle and triangle using the Strategy pattern.

// Define the Strategy interface
interface ShapeStrategy {
    public function area($width, $height);
}

// Implement the rectangle strategy
class RectangleStrategy implements ShapeStrategy {
    public function area($width, $height) {
        return $width * $height;
    }
}

// Implement the circle strategy
class CircleStrategy implements ShapeStrategy {
    public function area($width, $height) {
        return pi() * ($width / 2) * ($height / 2);
    }
}

// Implement the triangle strategy
class TriangleStrategy implements ShapeStrategy {
    public function area($width, $height) {
        return 0.5 * $width * $height;
    }
}

// Context class using the Strategy pattern
class ShapeAreaCalculator {
    private $strategy;

    public function setStrategy(ShapeStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function calculateArea($width, $height) {
        return $this->strategy->area($width, $height);
    }
}

// Usage
$calculator = new ShapeAreaCalculator();
$rectangleStrategy = new RectangleStrategy();
$calculator->setStrategy($rectangleStrategy);
echo "Rectangle Area: " . $calculator->calculateArea(5, 10) . "\n";

$circleStrategy = new CircleStrategy();
$calculator->setStrategy($circleStrategy);
echo "Circle Area: " . $calculator->calculateArea(5, 5) . "\n";

$triangleStrategy = new TriangleStrategy();
$calculator->setStrategy($triangleStrategy);
echo "Triangle Area: " . $calculator->calculateArea(5, 10) . "\n";
?>
```