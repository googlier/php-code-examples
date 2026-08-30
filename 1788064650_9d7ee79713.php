```php
<?php
// Problem: Implement a function that takes an array of integers and returns the sum of all positive numbers.

// Design Pattern: Strategy

class SumCalculator {
    protected $strategy;

    public function __construct(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function calculateSum(array $numbers): int {
        return $this->strategy->sum($numbers);
    }
}

interface SumStrategy {
    public function sum(array $numbers): int;
}

class PositiveSumStrategy implements SumStrategy {
    public function sum(array $numbers): int {
        return array_sum(array_filter($numbers, function($num) {
            return $num > 0;
        }));
    }
}

// Usage
$numbers = [-5, 10, 15, -2, 20];
$strategy = new PositiveSumStrategy();
$calculator = new SumCalculator($strategy);
echo "Sum of positive numbers: " . $calculator->calculateSum($numbers);
?>
```