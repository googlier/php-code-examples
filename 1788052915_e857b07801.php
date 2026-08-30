```php
<?php
// Problem: Create a function that takes an array of integers and returns the sum of all even numbers.

// Design Pattern: Strategy

interface SumStrategy {
    public function sumEven($numbers);
}

class SumEvenStrategy implements SumStrategy {
    public function sumEven($numbers) {
        return array_sum(array_filter($numbers, function($num) {
            return $num % 2 === 0;
        }));
    }
}

function calculateEvenSum($numbers, SumStrategy $strategy) {
    return $strategy->sumEven($numbers);
}

$numbers = [1, 2, 3, 4, 5, 6];
$strategy = new SumEvenStrategy();
echo calculateEvenSum($numbers, $strategy); // Output: 12
?>
```