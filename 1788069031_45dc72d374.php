```php
<?php

// Problem: Implement a function that takes an array of integers and returns the sum of all even numbers.

// Design Pattern: Strategy Pattern

// Define the strategy interface
interface SumStrategy {
    public function calculateSum($numbers);
}

// Implement the strategy for summing even numbers
class EvenSumStrategy implements SumStrategy {
    public function calculateSum($numbers) {
        $sum = 0;
        foreach ($numbers as $number) {
            if ($number % 2 == 0) {
                $sum += $number;
            }
        }
        return $sum;
    }
}

// Context class using the strategy
class SumContext {
    private $strategy;

    public function __construct(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function executeStrategy($numbers) {
        return $this->strategy->calculateSum($numbers);
    }
}

// Usage
$numbers = [1, 2, 3, 4, 5, 6];
$strategy = new EvenSumStrategy();
$context = new SumContext($strategy);
$result = $context->executeStrategy($numbers);
echo "Sum of even numbers: " . $result;

?>
```