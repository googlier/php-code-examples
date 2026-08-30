```php
<?php

// Problem: Implement a function that takes an array of integers and returns the sum of all even numbers.

// Design Pattern: Strategy

interface SumStrategy {
    public function sum(array $numbers): int;
}

class EvenSumStrategy implements SumStrategy {
    public function sum(array $numbers): int {
        $sum = 0;
        foreach ($numbers as $number) {
            if ($number % 2 === 0) {
                $sum += $number;
            }
        }
        return $sum;
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
echo $calculator->calculateSum($numbers); // Output: 12
?>
```