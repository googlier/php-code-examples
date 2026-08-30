```php
<?php
// Random Programming Problem: Create a function that takes an array of integers and returns the sum of all even numbers in the array.

// Random Design Pattern: Strategy Pattern

interface SumStrategy {
    public function sum(array $numbers);
}

class EvenSumStrategy implements SumStrategy {
    public function sum(array $numbers) {
        return array_sum(array_filter($numbers, function($num) {
            return $num % 2 === 0;
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

    public function executeStrategy(array $numbers) {
        return $this->strategy->sum($numbers);
    }
}

// Usage
$numbers = [1, 2, 3, 4, 5, 6];
$strategy = new EvenSumStrategy();
$context = new SumContext($strategy);
echo $context->executeStrategy($numbers); // Output: 12
?>
```