```php
<?php

// Problem: Implement a function that takes an array of integers and returns the sum of all even numbers.

// Solution: Use the Strategy pattern to implement different sum strategies.

interface SumStrategy {
    public function sum(array $numbers): int;
}

class EvenSumStrategy implements SumStrategy {
    public function sum(array $numbers): int {
        return array_sum(array_filter($numbers, function($num) {
            return $num % 2 === 0;
        }));
    }
}

class OddSumStrategy implements SumStrategy {
    public function sum(array $numbers): int {
        return array_sum(array_filter($numbers, function($num) {
            return $num % 2 !== 0;
        }));
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

    public function executeStrategy(array $numbers): int {
        return $this->strategy->sum($numbers);
    }
}

// Usage
$numbers = [1, 2, 3, 4, 5, 6];

$evenSumContext = new SumContext(new EvenSumStrategy());
echo "Sum of even numbers: " . $evenSumContext->executeStrategy($numbers) . "\n";

$oddSumContext = new SumContext(new OddSumStrategy());
echo "Sum of odd numbers: " . $oddSumContext->executeStrategy($numbers) . "\n";

?>
```