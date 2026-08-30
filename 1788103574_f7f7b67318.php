```php
<?php
// Problem: Create a function that takes an array of integers and returns the sum of all even numbers.

// Design Pattern: Strategy

interface SumStrategy {
    public function calculateSum($numbers);
}

class EvenSumStrategy implements SumStrategy {
    public function calculateSum($numbers) {
        $sum = 0;
        foreach ($numbers as $number) {
            if ($number % 2 == 0) {
                $sum += $number;
            }
        }
        return $sum;
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