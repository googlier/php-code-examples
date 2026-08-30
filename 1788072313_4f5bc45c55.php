```php
<?php

// Generate a random programming problem and solve it using a random design pattern

// Problem: Implement a function that takes an array of integers and returns the sum of all positive integers in the array.

// Design Pattern: Strategy

// Create a strategy interface
interface SumStrategy {
    public function sum(array $numbers): int;
}

// Create a concrete strategy for summing positive integers
class PositiveSumStrategy implements SumStrategy {
    public function sum(array $numbers): int {
        return array_sum(array_filter($numbers, function($number) {
            return $number > 0;
        }));
    }
}

// Create a context class that uses a strategy
class SumContext {
    private $strategy;

    public function __construct(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function executeStrategy(array $numbers): int {
        return $this->strategy->sum($numbers);
    }
}

// Generate a random array of integers
$numbers = array_map(function() {
    return rand(-10, 10);
}, range(1, 10));

// Create an instance of the context with the positive sum strategy
$context = new SumContext(new PositiveSumStrategy());

// Execute the strategy and print the result
echo "Sum of positive numbers: " . $context->executeStrategy($numbers);

?>
```