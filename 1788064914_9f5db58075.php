```php
<?php

// Generate a random programming problem
$problem = "Write a function that takes an array of integers and returns the sum of all prime numbers in the array.";

// Generate a random design pattern
$designPattern = "Strategy";

// Solve the problem using the random design pattern
class PrimeSumCalculator {
    public function calculateSum(array $numbers) {
        $sum = 0;
        foreach ($numbers as $number) {
            if ($this->isPrime($number)) {
                $sum += $number;
            }
        }
        return $sum;
    }

    private function isPrime($number) {
        if ($number <= 1) {
            return false;
        }
        for ($i = 2; $i <= sqrt($number); $i++) {
            if ($number % $i == 0) {
                return false;
            }
        }
        return true;
    }
}

$calculator = new PrimeSumCalculator();
$numbers = [2, 3, 4, 5, 6, 7, 8, 9, 10];
echo $calculator->calculateSum($numbers);

?>
```