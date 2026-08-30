```php
<?php
// Problem: Implement a function that takes an array of integers and returns the sum of all even numbers in the array.

// Design Pattern: Strategy

// Strategy Interface
interface SumStrategy {
    public function sum($numbers);
}

// EvenSum Strategy
class EvenSum implements SumStrategy {
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

// Function to use the strategy
function sumNumbers($numbers, SumStrategy $strategy) {
    return $strategy->sum($numbers);
}

// Usage
$numbers = [1, 2, 3, 4, 5, 6];
$strategy = new EvenSum();
echo sumNumbers($numbers, $strategy); // Output: 12
?>
```