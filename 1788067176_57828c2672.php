```php
<?php

// Problem: Implement a function that takes an array of integers and returns the sum of all even numbers in the array.

// Design Pattern: Strategy

interface SumStrategy {
    public function sum($numbers);
}

class EvenSumStrategy implements SumStrategy {
    public function sum($numbers) {
        return array_sum(array_filter($numbers, function($num) {
            return $num % 2 === 0;
        }));
    }
}

class TotalSumStrategy implements SumStrategy {
    public function sum($numbers) {
        return array_sum($numbers);
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

// Usage
$numbers = [1, 2, 3, 4, 5, 6];

$evenSumContext = new SumContext(new EvenSumStrategy());
echo "Even Sum: " . $evenSumContext->executeStrategy($numbers) . "\n";

$totalSumContext = new SumContext(new TotalSumStrategy());
echo "Total Sum: " . $totalSumContext->executeStrategy($numbers) . "\n";

?>
```