```php
<?php

// Problem: Implement a function that takes an array of integers and returns the sum of all even numbers in the array.

// Design Pattern: Strategy

interface SumStrategy {
    public function sum($numbers);
}

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

function calculateSum($numbers, SumStrategy $strategy) {
    return $strategy->sum($numbers);
}

$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$evenSumStrategy = new EvenSumStrategy();
$sum = calculateSum($numbers, $evenSumStrategy);

echo "Sum of even numbers: " . $sum;

?>
```