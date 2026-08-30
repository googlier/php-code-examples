```php
<?php

// Problem: Create a function that takes an array of integers and returns the sum of all even numbers.

// Design Pattern: Strategy

interface SumStrategy {
    public function sum($numbers);
}

class EvenSumStrategy implements SumStrategy {
    public function sum($numbers) {
        $sum = 0;
        foreach ($numbers as $number) {
            if ($number % 2 == 0) {
                $sum += $number;
            }
        }
        return $sum;
    }
}

class OddSumStrategy implements SumStrategy {
    public function sum($numbers) {
        $sum = 0;
        foreach ($numbers as $number) {
            if ($number % 2 != 0) {
                $sum += $number;
            }
        }
        return $sum;
    }
}

class SumContext {
    private $strategy;

    public function __construct(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function executeStrategy($numbers) {
        return $this->strategy->sum($numbers);
    }
}

$numbers = [1, 2, 3, 4, 5, 6];

// Using EvenSumStrategy
$context = new SumContext(new EvenSumStrategy());
echo "Sum of even numbers: " . $context->executeStrategy($numbers) . "<br>";

// Using OddSumStrategy
$context->setStrategy(new OddSumStrategy());
echo "Sum of odd numbers: " . $context->executeStrategy($numbers);

?>
```