```php
<?php

// Problem: Create a function that takes an array of integers and returns the sum of all prime numbers in the array.

// Design Pattern: Strategy Pattern

class PrimeSumStrategy {
    public function execute($numbers) {
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

class ArrayProcessor {
    private $strategy;

    public function __construct($strategy) {
        $this->strategy = $strategy;
    }

    public function process($numbers) {
        return $this->strategy->execute($numbers);
    }
}

$numbers = [2, 3, 4, 5, 6, 7, 8, 9, 10];
$strategy = new PrimeSumStrategy();
$processor = new ArrayProcessor($strategy);
echo $processor->process($numbers);
?>
```