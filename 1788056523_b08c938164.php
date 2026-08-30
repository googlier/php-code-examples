```php
<?php
// Problem: Create a function to calculate the area of a rectangle given its length and width.
// Design Pattern: Strategy

interface AreaCalculator {
    public function calculateArea($length, $width);
}

class RectangleAreaCalculator implements AreaCalculator {
    public function calculateArea($length, $width) {
        return $length * $width;
    }
}

class CircleAreaCalculator implements AreaCalculator {
    public function calculateArea($length, $width) {
        return M_PI * pow(($length + $width) / 2, 2);
    }
}

function calculate($length, $width, AreaCalculator $calculator) {
    return $calculator->calculateArea($length, $width);
}

$length = rand(1, 100);
$width = rand(1, 100);

$rectangleCalculator = new RectangleAreaCalculator();
echo "Rectangle Area: " . calculate($length, $width, $rectangleCalculator) . "\n";

$circleCalculator = new CircleAreaCalculator();
echo "Circle Area: " . calculate($length, $width, $circleCalculator) . "\n";
?>
```