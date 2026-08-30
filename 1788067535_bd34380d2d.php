```php
<?php

// Problem: Implement a function that takes an array of integers and returns the sum of all even numbers.
// Design Pattern: Strategy

interface SumStrategy {
    public function sum(array $numbers): int;
}

class EvenSumStrategy implements SumStrategy {
    public function sum(array $numbers): int {
        $sum = 0;
        foreach ($numbers as $number) {
            if ($number % 2 == 0) {
                $sum += $number;
            }
        }
        return $sum;
    }
}

class OddSumStrategy implements SumStrategy {
    public function sum(array $numbers): int {
        $sum = 0;
        foreach ($numbers as $number) {
            if ($number % 2 != 0) {
                $sum += $number;
            }
        }
        return $sum;
    }
}

function calculateSum(array $numbers, SumStrategy $strategy): int {
    return $strategy->sum($numbers);
}

$numbers = [1, 2, 3, 4, 5, 6];
$evenSumStrategy = new EvenSumStrategy();
$oddSumStrategy = new OddSumStrategy();

echo "Even Sum: " . calculateSum($numbers, $evenSumStrategy) . "\n";
echo "Odd Sum: " . calculateSum($numbers, $oddSumStrategy) . "\n";

?>
```