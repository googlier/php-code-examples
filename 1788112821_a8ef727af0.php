```php
<?php

// Problem: Implement a function that takes an array of integers and returns an array of their squares.

// Design Pattern: Factory Method

interface SquareCalculator {
    public function calculate($number);
}

class PositiveSquareCalculator implements SquareCalculator {
    public function calculate($number) {
        return $number * $number;
    }
}

class NegativeSquareCalculator implements SquareCalculator {
    public function calculate($number) {
        return -($number * $number);
    }
}

class SquareCalculatorFactory {
    public static function getCalculator($number) {
        if ($number >= 0) {
            return new PositiveSquareCalculator();
        } else {
            return new NegativeSquareCalculator();
        }
    }
}

function calculateSquares($numbers) {
    $result = [];
    foreach ($numbers as $number) {
        $calculator = SquareCalculatorFactory::getCalculator($number);
        $result[] = $calculator->calculate($number);
    }
    return $result;
}

// Example usage:
$numbers = [3, -2, 5, -4];
echo implode(", ", calculateSquares($numbers)); // Output: 9, 4, 25, 16

?>
```