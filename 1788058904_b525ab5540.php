```php
<?php
// Problem: Implement a function to filter out all non-numeric values from an array and return the sum of the remaining numeric values.

// Design Pattern: Strategy

interface SumStrategy {
    public function sum(array $numbers): int;
}

class NumericSumStrategy implements SumStrategy {
    public function sum(array $numbers): int {
        return array_sum(array_filter($numbers, 'is_numeric'));
    }
}

class StringSumStrategy implements SumStrategy {
    public function sum(array $numbers): int {
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

    public function executeStrategy(array $numbers): int {
        return $this->strategy->sum($numbers);
    }
}

// Usage
$numbers = [1, 'a', 2, 'b', 3, 4.5, '5'];
$numericStrategy = new NumericSumStrategy();
$stringStrategy = new StringSumStrategy();

$context = new SumContext($numericStrategy);
echo $context->executeStrategy($numbers); // Outputs: 6

$context->setStrategy($stringStrategy);
echo $context->executeStrategy($numbers); // Outputs: 15.5
?>
```