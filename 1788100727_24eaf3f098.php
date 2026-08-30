```php
<?php

// Problem: Implement a function that takes an array of integers and returns the sum of the squares of the numbers that are divisible by 3.

// Design Pattern: Strategy Pattern

interface SquareSumStrategy {
    public function isDivisibleByThree($number);
    public function calculateSquare($number);
}

class DivisibleByThreeStrategy implements SquareSumStrategy {
    public function isDivisibleByThree($number) {
        return $number % 3 === 0;
    }

    public function calculateSquare($number) {
        return $number * $number;
    }
}

class SumCalculator {
    private $strategy;

    public function __construct(SquareSumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function calculateSum($numbers) {
        $sum = 0;
        foreach ($numbers as $number) {
            if ($this->strategy->isDivisibleByThree($number)) {
                $sum += $this->strategy->calculateSquare($number);
            }
        }
        return $sum;
    }
}

// Usage
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9];
$strategy = new DivisibleByThreeStrategy();
$calculator = new SumCalculator($strategy);
echo $calculator->calculateSum($numbers); // Output: 180
?>
```