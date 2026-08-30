```php
<?php

// Problem: Create a function that takes an array of integers and returns the sum of all even numbers in the array.

// Design Pattern: Strategy

interface SumStrategy {
    public function sumEvenNumbers(array $numbers): int;
}

class SumEvenNumbersStrategy implements SumStrategy {
    public function sumEvenNumbers(array $numbers): int {
        $sum = 0;
        foreach ($numbers as $number) {
            if ($number % 2 === 0) {
                $sum += $number;
            }
        }
        return $sum;
    }
}

function calculateSum(array $numbers, SumStrategy $strategy): int {
    return $strategy->sumEvenNumbers($numbers);
}

// Usage
$numbers = [1, 2, 3, 4, 5, 6];
$strategy = new SumEvenNumbersStrategy();
echo calculateSum($numbers, $strategy); // Output: 12
?>
```