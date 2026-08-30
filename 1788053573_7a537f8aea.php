```php
<?php

// Problem: Implement a function that takes an array of integers and returns the sum of all even numbers.

// Design Pattern: Strategy Pattern

interface SumStrategy {
    public function sum(array $numbers): int;
}

class EvenSumStrategy implements SumStrategy {
    public function sum(array $numbers): int {
        return array_sum(array_filter($numbers, function($number) {
            return $number % 2 === 0;
        }));
    }
}

class SumCalculator {
    private $strategy;

    public function __construct(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function calculateSum(array $numbers): int {
        return $this->strategy->sum($numbers);
    }
}

// Usage
$numbers = [1, 2, 3, 4, 5, 6];
$strategy = new EvenSumStrategy();
$calculator = new SumCalculator($strategy);
$result = $calculator->calculateSum($numbers);
echo $result; // Output: 12

?>
```