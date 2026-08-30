```php
<?php

// Problem: Implement a function that takes an array of integers and returns the sum of all positive integers in the array.

// Design Pattern: Strategy

interface SumStrategy {
    public function calculateSum(array $numbers): int;
}

class PositiveSumStrategy implements SumStrategy {
    public function calculateSum(array $numbers): int {
        $sum = 0;
        foreach ($numbers as $number) {
            if ($number > 0) {
                $sum += $number;
            }
        }
        return $sum;
    }
}

class ArraySumCalculator {
    private $strategy;

    public function __construct(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function sum(array $numbers): int {
        return $this->strategy->calculateSum($numbers);
    }
}

// Usage
$numbers = [-1, 2, -4, 5, 6];
$strategy = new PositiveSumStrategy();
$calculator = new ArraySumCalculator($strategy);
echo $calculator->sum($numbers); // Output: 13
?>
```