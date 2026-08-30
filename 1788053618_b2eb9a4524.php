```php
<?php
// Problem: Create a function that takes an array of integers and returns the sum of all even numbers.

// Design Pattern: Strategy Pattern

// Define the Strategy Interface
interface SumStrategy {
    public function calculate($numbers);
}

// Implement the Strategy for Summing Even Numbers
class EvenSumStrategy implements SumStrategy {
    public function calculate($numbers) {
        $sum = 0;
        foreach ($numbers as $number) {
            if ($number % 2 == 0) {
                $sum += $number;
            }
        }
        return $sum;
    }
}

// Function to apply the Strategy
function sumNumbers($numbers, SumStrategy $strategy) {
    return $strategy->calculate($numbers);
}

// Usage
$numbers = [1, 2, 3, 4, 5, 6];
$evenSumStrategy = new EvenSumStrategy();
echo sumNumbers($numbers, $evenSumStrategy);
?>
```