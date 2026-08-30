```php
<?php

// Generate a random programming problem
$problem = 'Create a function that accepts an array of integers and returns the sum of all even numbers in the array.';

// Define a random design pattern
$designPattern = 'Strategy';

// Implement the design pattern in PHP
class SumEvenNumbers {
    private $strategy;

    public function __construct($strategy) {
        $this->strategy = $strategy;
    }

    public function execute($array) {
        return $this->strategy->calculate($array);
    }
}

interface Strategy {
    public function calculate($array);
}

class EvenNumberSumStrategy implements Strategy {
    public function calculate($array) {
        $sum = 0;
        foreach ($array as $number) {
            if ($number % 2 == 0) {
                $sum += $number;
            }
        }
        return $sum;
    }
}

// Create an instance of the SumEvenNumbers class with the EvenNumberSumStrategy
$sumEvenNumbers = new SumEvenNumbers(new EvenNumberSumStrategy());

// Test the function with an array of integers
$array = [1, 2, 3, 4, 5, 6];
$result = $sumEvenNumbers->execute($array);

// Output the result
echo $result; // Output: 12
?>
```