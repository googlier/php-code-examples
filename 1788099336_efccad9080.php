```php
<?php

// Problem: Create a function that takes an array of integers and returns the sum of all positive numbers.

// Design Pattern: Strategy

interface SumStrategy {
    public function calculateSum(array $numbers): int;
}

class PositiveSumStrategy implements SumStrategy {
    public function calculateSum(array $numbers): int {
        return array_sum(array_filter($numbers, function($number) {
            return $number > 0;
        }));
    }
}

class NegativeSumStrategy implements SumStrategy {
    public function calculateSum(array $numbers): int {
        return array_sum(array_filter($numbers, function($number) {
            return $number < 0;
        }));
    }
}

class SumContext {
    private $strategy;

    public function __construct(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function executeStrategy(array $numbers): int {
        return $this->strategy->calculateSum($numbers);
    }
}

// Usage
$numbers = [-1, 2, -3, 4, 5];
$context = new SumContext(new PositiveSumStrategy());
echo "Sum of positive numbers: " . $context->executeStrategy($numbers); // Output: 11

$context->setStrategy(new NegativeSumStrategy());
echo "Sum of negative numbers: " . $context->executeStrategy($numbers); // Output: -4
?>
```