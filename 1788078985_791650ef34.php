```php
<?php

// Problem: Implement a function that takes an array of integers and returns the sum of all the even numbers.

// Design Pattern: Strategy

// Define a strategy interface
interface SumStrategy {
    public function sum(array $numbers): int;
}

// Implement a strategy for summing even numbers
class EvenSumStrategy implements SumStrategy {
    public function sum(array $numbers): int {
        return array_sum(array_filter($numbers, function($num) {
            return $num % 2 === 0;
        }));
    }
}

// Function to calculate sum using a given strategy
function calculateSum(array $numbers, SumStrategy $strategy): int {
    return $strategy->sum($numbers);
}

// Example usage
$numbers = [1, 2, 3, 4, 5, 6];
$strategy = new EvenSumStrategy();
$result = calculateSum($numbers, $strategy);

echo "Sum of even numbers: " . $result; // Output: Sum of even numbers: 12

?>
```