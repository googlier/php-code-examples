```php
<?php

// Generate a random programming problem
$problem = "Create a function that accepts an array of integers and returns the sum of all the even numbers in the array.";

// Generate a random design pattern
$designPattern = "Strategy";

// Implement the design pattern in PHP
class SumEvenNumbersStrategy {
    public function execute($array) {
        $sum = 0;
        foreach ($array as $number) {
            if ($number % 2 == 0) {
                $sum += $number;
            }
        }
        return $sum;
    }
}

// Implement the problem using the design pattern
class SumEvenNumbers {
    private $strategy;

    public function __construct($strategy) {
        $this->strategy = $strategy;
    }

    public function sumEven($array) {
        return $this->strategy->execute($array);
    }
}

// Test the implementation
$array = [1, 2, 3, 4, 5, 6];
$sumEvenNumbersStrategy = new SumEvenNumbersStrategy();
$sumEvenNumbers = new SumEvenNumbers($sumEvenNumbersStrategy);
echo $sumEvenNumbers->sumEven($array); // Output: 12
?>
```