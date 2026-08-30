```php
<?php

// Problem: Implement a function that takes an array of integers and returns the sum of all even numbers in the array.

// Design Pattern: Strategy

class SumEvenStrategy {
    public function sumEven($numbers) {
        $sum = 0;
        foreach ($numbers as $number) {
            if ($number % 2 == 0) {
                $sum += $number;
            }
        }
        return $sum;
    }
}

class ArraySum {
    private $strategy;

    public function __construct(SumEvenStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function execute($numbers) {
        return $this->strategy->sumEven($numbers);
    }
}

// Usage
$numbers = [1, 2, 3, 4, 5, 6];
$strategy = new SumEvenStrategy();
$sumEven = new ArraySum($strategy);
echo $sumEven->execute($numbers); // Output: 12
?>
```