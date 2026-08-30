```php
<?php
// Problem: Create a function to calculate the area of a circle given its radius. Use the Strategy Design Pattern to allow different area calculation strategies to be plugged in.

// Define the Strategy interface
interface AreaStrategy {
    public function calculateArea($radius);
}

// Implement the Concrete Strategy for Circle Area
class CircleAreaStrategy implements AreaStrategy {
    public function calculateArea($radius) {
        return M_PI * $radius * $radius;
    }
}

// Implement the Context
class AreaCalculator {
    private $strategy;

    public function __construct(AreaStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(AreaStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function calculate($radius) {
        return $this->strategy->calculateArea($radius);
    }
}

// Usage
$strategy = new CircleAreaStrategy();
$calculator = new AreaCalculator($strategy);
echo $calculator->calculate(5); // Output: 78.53981633974483
?>
```