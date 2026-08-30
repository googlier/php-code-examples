```php
<?php

// Define the Problem
// Implement a function that takes an array of integers and returns the sum of all even numbers in the array.

// Solution using Strategy Design Pattern

// Define the Strategy Interface
interface SumStrategy {
    public function sum($numbers);
}

// Implement the Concrete Strategy for Summing Even Numbers
class EvenSumStrategy implements SumStrategy {
    public function sum($numbers) {
        $sum = 0;
        foreach ($numbers as $number) {
            if ($number % 2 == 0) {
                $sum += $number;
            }
        }
        return $sum;
    }
}

// Define the Context
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
echo $context->executeStrategy($numbers); // Output: 12
?>
```