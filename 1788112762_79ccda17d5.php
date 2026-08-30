```php
<?php

// Random Problem: Create a function to calculate the area of a rectangle given its length and width. Use the Strategy design pattern to allow for different calculation strategies (e.g., standard area calculation, area calculation with a 10% discount).

// Define the Strategy interface
interface AreaStrategy {
    public function calculateArea($length, $width);
}

// Implement the standard AreaStrategy
class StandardAreaStrategy implements AreaStrategy {
    public function calculateArea($length, $width) {
        return $length * $width;
    }
}

// Implement the DiscountedAreaStrategy
class DiscountedAreaStrategy implements AreaStrategy {
    public function calculateArea($length, $width) {
        return ($length * $width) * 0.9;
    }
}

// Context class to use the strategy
class AreaCalculator {
    private $strategy;

    public function setStrategy(AreaStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function calculate($length, $width) {
        return $this->strategy->calculateArea($length, $width);
    }
}

// Usage
$calculator = new AreaCalculator();
$calculator->setStrategy(new StandardAreaStrategy());
echo $calculator->calculate(10, 5); // Outputs 50

$calculator->setStrategy(new DiscountedAreaStrategy());
echo $calculator->calculate(10, 5); // Outputs 45
?>
```