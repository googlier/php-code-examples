```php
<?php

// Problem: Generate a function that takes an array of integers and returns the sum of the even numbers.

// Design Pattern: Strategy Pattern

// Interface
interface SumStrategy {
    public function sum(array $numbers): int;
}

// Concrete Strategy 1
class EvenSumStrategy implements SumStrategy {
    public function sum(array $numbers): int {
        return array_sum(array_filter($numbers, function($num) {
            return $num % 2 === 0;
        }));
    }
}

// Concrete Strategy 2
class OddSumStrategy implements SumStrategy {
    public function sum(array $numbers): int {
        return array_sum(array_filter($numbers, function($num) {
            return $num % 2 !== 0;
        }));
    }
}

// Context
class SumContext {
    private $strategy;

    public function __construct(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(SumStrategy $strategy): void {
        $this->strategy = $strategy;
    }

    public function executeStrategy(array $numbers): int {
        return $this->strategy->sum($numbers);
    }
}

// Usage
$numbers = [1, 2, 3, 4, 5, 6];
$context = new SumContext(new EvenSumStrategy());
echo "Sum of Even Numbers: " . $context->executeStrategy($numbers) . "<br>";

$context->setStrategy(new OddSumStrategy());
echo "Sum of Odd Numbers: " . $context->executeStrategy($numbers) . "<br>";
?>
```