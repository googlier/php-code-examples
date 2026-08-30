```php
<?php
// Generate random programming problem and solve it using a random design pattern

// Problem: Implement a function that takes an array of integers and returns the sum of all even numbers in the array.

// Design Pattern: Strategy Pattern

// Strategy Interface
interface SumStrategy {
    public function sum($numbers);
}

// Concrete Strategy for Summing Even Numbers
class EvenSumStrategy implements SumStrategy {
    public function sum($numbers) {
        return array_sum(array_filter($numbers, function($number) {
            return $number % 2 == 0;
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

    public function execute($numbers) {
        return $this->strategy->sum($numbers);
    }
}

// Usage
$numbers = [1, 2, 3, 4, 5, 6];
$strategy = new EvenSumStrategy();
$numberSum = new NumberSum($strategy);
echo $numberSum->execute($numbers); // Output: 12
?>
```