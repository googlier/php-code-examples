```php
<?php

// Define a random programming problem
// Problem: Create a function that takes an array of integers and returns the sum of all even numbers in the array.

// Define a random design pattern
// Design Pattern: Strategy

// PHP code using the Strategy pattern to solve the problem
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

class ArraySum {
    private $strategy;

    public function __construct(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function calculateSum($numbers) {
        return $this->strategy->sumEven($numbers);
    }
}

// Usage
$numbers = [1, 2, 3, 4, 5, 6];
$strategy = new SumEvenStrategy();
$arraySum = new ArraySum($strategy);
echo $arraySum->calculateSum($numbers); // Output: 12

?>
```