```php
<?php

// Problem: Implement a function that takes an array of integers and returns the sum of all positive numbers in the array. Use the Strategy design pattern to implement this functionality.

// Strategy Interface
interface SumStrategy {
    public function sum(array $numbers);
}

// Concrete Strategy for Positive Numbers
class PositiveSumStrategy implements SumStrategy {
    public function sum(array $numbers) {
        return array_sum(array_filter($numbers, function($num) {
            return $num > 0;
        }));
    }
}

// Context
class NumberSum {
    private $strategy;

    public function __construct(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function calculateSum(array $numbers) {
        return $this->strategy->sum($numbers);
    }
}

// Usage
$numbers = [1, -2, 3, 4, -5, 6];

$context = new NumberSum(new PositiveSumStrategy());
echo $context->calculateSum($numbers); // Output: 10

?>
```