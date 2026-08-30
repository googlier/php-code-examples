```php
<?php

// Problem: Implement a function that takes an array of integers and returns the sum of all even numbers in the array.

// Design Pattern: Strategy

// Context class
class SumEvenNumbers {
    private $strategy;

    public function setStrategy($strategy) {
        $this->strategy = $strategy;
    }

    public function execute($array) {
        return $this->strategy->sumEven($array);
    }
}

// Strategy interface
interface SumStrategy {
    public function sumEven($array);
}

// Concrete strategy for summing even numbers
class EvenSumStrategy implements SumStrategy {
    public function sumEven($array) {
        $sum = 0;
        foreach ($array as $number) {
            if ($number % 2 == 0) {
                $sum += $number;
            }
        }
        return $sum;
    }
}

// Usage
$array = [1, 2, 3, 4, 5, 6];
$sumEvenNumbers = new SumEvenNumbers();
$sumEvenNumbers->setStrategy(new EvenSumStrategy());
echo $sumEvenNumbers->execute($array); // Output: 12
?>
```