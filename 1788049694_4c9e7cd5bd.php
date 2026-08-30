```php
<?php
// Problem: Implement a function that takes an array of integers and returns the sum of all even numbers.

// Design Pattern: Strategy

// Define the strategy interface
interface SumStrategy {
    public function calculateSum(array $numbers);
}

// Implement the strategy for summing even numbers
class EvenSumStrategy implements SumStrategy {
    public function calculateSum(array $numbers) {
        return array_sum(array_filter($numbers, function($num) {
            return $num % 2 === 0;
        }));
    }
}

// Context class using the strategy
class SumCalculator {
    private $strategy;

    public function __construct(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function calculate(array $numbers) {
        return $this->strategy->calculateSum($numbers);
    }
}

// Usage
$numbers = [1, 2, 3, 4, 5, 6];
$strategy = new EvenSumStrategy();
$calculator = new SumCalculator($strategy);
echo $calculator->calculate($numbers); // Output: 12
?>
```