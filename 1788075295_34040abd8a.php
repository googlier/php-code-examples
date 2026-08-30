```php
<?php

// Problem: Create a function that takes an array of integers and returns the sum of all even numbers in the array.

// Design Pattern: Strategy Pattern

class SumCalculator {
    public function calculate($array) {
        return array_sum(array_filter($array, function($num) {
            return $num % 2 === 0;
        }));
    }
}

class EvenNumberSum {
    private $strategy;

    public function __construct(SumCalculator $strategy) {
        $this->strategy = $strategy;
    }

    public function sumEvenNumbers($array) {
        return $this->strategy->calculate($array);
    }
}

// Usage
$calculator = new SumCalculator();
$evenNumberSum = new EvenNumberSum($calculator);
$array = [1, 2, 3, 4, 5, 6];
echo $evenNumberSum->sumEvenNumbers($array); // Output: 12

?>
```