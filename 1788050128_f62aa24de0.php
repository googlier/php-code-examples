```php
<?php

// Problem: Implement a function that takes an array of integers and returns the sum of all even numbers in the array. Use the Strategy design pattern to achieve this.

// Define the Strategy interface
interface SumStrategy {
    public function sum($numbers);
}

// Implement the Concrete Strategy for summing even numbers
class EvenSumStrategy implements SumStrategy {
    public function sum($numbers) {
        return array_sum(array_filter($numbers, function($num) {
            return $num % 2 === 0;
        }));
    }
}

// Implement the Context class that uses the Strategy
class SumContext {
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

// Usage
$numbers = [1, 2, 3, 4, 5, 6];
$context = new SumContext(new EvenSumStrategy());
$result = $context->executeStrategy($numbers);
echo "Sum of even numbers: " . $result;

?>
```