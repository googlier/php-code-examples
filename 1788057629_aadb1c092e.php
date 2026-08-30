```php
<?php

// Problem: Create a function that takes an array of integers and returns the sum of all even numbers in the array.

// Design Pattern: Strategy

// Strategy Interface
interface SumStrategy {
    public function sum(array $numbers): int;
}

// Concrete Strategy 1: SumEvenNumbersStrategy
class SumEvenNumbersStrategy implements SumStrategy {
    public function sum(array $numbers): int {
        return array_sum(array_filter($numbers, function($number) {
            return $number % 2 === 0;
        }));
    }
}

// Context
class NumberSum {
    private $strategy;

    public function __construct(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(SumStrategy $strategy): void {
        $this->strategy = $strategy;
    }

    public function executeStrategy(array $numbers): int {
        return $this->strategy->sum($numbers);
    }
}

// Usage
$numbers = [1, 2, 3, 4, 5, 6];
$strategy = new SumEvenNumbersStrategy();
$numberSum = new NumberSum($strategy);
echo $numberSum->executeStrategy($numbers); // Output: 12

?>
```