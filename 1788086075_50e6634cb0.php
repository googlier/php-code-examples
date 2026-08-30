```php
<?php
// Problem: Implement a function that takes an array of integers and returns the sum of all even numbers.

// Design Pattern: Strategy

// Interface
interface SumStrategy {
    public function sum(array $numbers);
}

// Concrete Strategy
class EvenSumStrategy implements SumStrategy {
    public function sum(array $numbers) {
        return array_sum(array_filter($numbers, function($num) {
            return $num % 2 === 0;
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

    public function calculateSum(array $numbers) {
        return $this->strategy->sum($numbers);
    }
}

// Usage
$numbers = [1, 2, 3, 4, 5, 6];
$numberSum = new NumberSum(new EvenSumStrategy());
echo $numberSum->calculateSum($numbers); // Output: 12
?>
```