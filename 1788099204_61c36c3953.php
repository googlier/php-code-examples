```php
<?php

// Problem: Create a function that takes an array of integers and returns the sum of all even numbers.

// Design Pattern: Strategy

interface SumStrategy {
    public function calculate($numbers);
}

class EvenSumStrategy implements SumStrategy {
    public function calculate($numbers) {
        return array_sum(array_filter($numbers, function($number) {
            return $number % 2 == 0;
        }));
    }
}

class SumCalculator {
    private $strategy;

    public function __construct(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function calculate($numbers) {
        return $this->strategy->calculate($numbers);
    }
}

// Usage
$numbers = [1, 2, 3, 4, 5, 6];
$strategy = new EvenSumStrategy();
$calculator = new SumCalculator($strategy);
echo $calculator->calculate($numbers); // Output: 12
?>
```