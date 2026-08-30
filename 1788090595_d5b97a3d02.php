```php
<?php

// Problem: Create a function that takes an array of integers and returns the sum of the squares of the even numbers.

// Design Pattern: Strategy

interface SquareCalculator {
    public function calculate(array $numbers): int;
}

class EvenNumberSquareCalculator implements SquareCalculator {
    public function calculate(array $numbers): int {
        $sum = 0;
        foreach ($numbers as $number) {
            if ($number % 2 === 0) {
                $sum += $number * $number;
            }
        }
        return $sum;
    }
}

function calculateEvenNumberSquares(array $numbers): int {
    $calculator = new EvenNumberSquareCalculator();
    return $calculator->calculate($numbers);
}

// Test the function
$numbers = [1, 2, 3, 4, 5, 6];
echo calculateEvenNumberSquares($numbers); // Output: 56

?>
```