```php
<?php
// Problem: Implement a function that takes an array of integers and returns the sum of all even numbers in the array.

// Design Pattern: Strategy

interface SumStrategy {
    public function calculateSum($numbers);
}

class EvenSumStrategy implements SumStrategy {
    public function calculateSum($numbers) {
        return array_sum(array_filter($numbers, function($num) {
            return $num % 2 == 0;
        }));
    }
}

function calculateEvenSum($numbers, SumStrategy $strategy) {
    return $strategy->calculateSum($numbers);
}

// Usage
$numbers = [1, 2, 3, 4, 5, 6];
$strategy = new EvenSumStrategy();
echo calculateEvenSum($numbers, $strategy); // Output: 12
?>
```