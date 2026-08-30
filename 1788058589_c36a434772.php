```php
<?php
// Problem: Implement a function that takes an array of integers and returns the sum of the even numbers.

// Design Pattern: Strategy Pattern

// Strategy Interface
interface SumStrategy {
    public function sumEven($numbers);
}

// Concrete Strategy for Summing Even Numbers
class EvenSumStrategy implements SumStrategy {
    public function sumEven($numbers) {
        return array_sum(array_filter($numbers, function($num) {
            return $num % 2 == 0;
        }));
    }
}

// Context
class NumberSum {
    private $strategy;

    public function __construct(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function sum($numbers) {
        return $this->strategy->sumEven($numbers);
    }
}

// Usage
$numbers = [1, 2, 3, 4, 5, 6];
$strategy = new EvenSumStrategy();
$context = new NumberSum($strategy);
echo $context->sum($numbers);
?>
```