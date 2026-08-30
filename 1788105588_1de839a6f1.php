```php
<?php

// Problem: Create a function that takes an array of integers as input and returns the sum of all even numbers in the array. Use the Strategy design pattern to allow for different summing strategies.

// Define the Strategy interface
interface SumStrategy {
    public function sum($numbers);
}

// Implement a concrete strategy for summing even numbers
class EvenSumStrategy implements SumStrategy {
    public function sum($numbers) {
        return array_sum(array_filter($numbers, function($num) {
            return $num % 2 === 0;
        }));
    }
}

// Implement a concrete strategy for summing odd numbers
class OddSumStrategy implements SumStrategy {
    public function sum($numbers) {
        return array_sum(array_filter($numbers, function($num) {
            return $num % 2 !== 0;
        }));
    }
}

// Context class that uses a strategy
class NumberSumContext {
    private $strategy;

    public function __construct(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function executeStrategy($numbers) {
        return $this->strategy->sum($numbers);
    }
}

// Example usage
$numbers = [1, 2, 3, 4, 5, 6];
$context = new NumberSumContext(new EvenSumStrategy());
echo $context->executeStrategy($numbers); // Output: 12

$context->setStrategy(new OddSumStrategy());
echo $context->executeStrategy($numbers); // Output: 9

?>
```