```php
<?php

// Problem: Implement a function that takes an array of integers and returns the sum of the even numbers.

// Design Pattern: Strategy Pattern

// Define an interface for the strategy
interface SumStrategy {
    public function calculateSum($numbers);
}

// Implement the strategy for summing even numbers
class EvenSumStrategy implements SumStrategy {
    public function calculateSum($numbers) {
        return array_sum(array_filter($numbers, function($number) {
            return $number % 2 === 0;
        }));
    }
}

// Function to use the strategy to calculate the sum
function calculateSumWithStrategy($numbers, SumStrategy $strategy) {
    return $strategy->calculateSum($numbers);
}

// Example usage
$numbers = [1, 2, 3, 4, 5, 6];
$strategy = new EvenSumStrategy();
echo calculateSumWithStrategy($numbers, $strategy);

?>
```