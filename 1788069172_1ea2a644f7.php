```php
<?php
// Problem: Implement a function that takes an array of integers and returns the sum of all even numbers. Use the Strategy design pattern.

// Strategy Interface
interface SumStrategy {
    public function sum($numbers);
}

// Concrete Strategy for Summing Even Numbers
class EvenSumStrategy implements SumStrategy {
    public function sum($numbers) {
        return array_sum(array_filter($numbers, function($num) {
            return $num % 2 == 0;
        }));
    }
}

// Context class
class NumberSum {
    private $strategy;

    public function __construct(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function calculateSum($numbers) {
        return $this->strategy->sum($numbers);
    }
}

// Usage
$numbers = [1, 2, 3, 4, 5, 6];
$strategy = new EvenSumStrategy();
$numberSum = new NumberSum($strategy);
echo $numberSum->calculateSum($numbers); // Output: 12
?>
```