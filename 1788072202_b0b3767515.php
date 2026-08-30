```php
<?php
// Problem: Implement a function that takes an array of integers and returns the sum of all even numbers in the array.

// Design Pattern: Strategy Pattern

interface SumStrategy {
    public function sum($numbers);
}

class EvenSumStrategy implements SumStrategy {
    public function sum($numbers) {
        return array_sum(array_filter($numbers, function($number) {
            return $number % 2 == 0;
        }));
    }
}

function calculateSum($numbers, SumStrategy $strategy) {
    return $strategy->sum($numbers);
}

$numbers = [1, 2, 3, 4, 5, 6];
$strategy = new EvenSumStrategy();
echo calculateSum($numbers, $strategy); // Output: 12
?>
```