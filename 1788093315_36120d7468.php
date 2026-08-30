```php
<?php
// Problem: Implement a function that takes an array of integers and returns the sum of the squares of the even numbers.

// Design Pattern: Strategy

// Strategy Interface
interface SumStrategy {
    public function sum(array $numbers): int;
}

// Concrete Strategy: SumEvenSquaresStrategy
class SumEvenSquaresStrategy implements SumStrategy {
    public function sum(array $numbers): int {
        $sum = 0;
        foreach ($numbers as $number) {
            if ($number % 2 == 0) {
                $sum += $number * $number;
            }
        }
        return $sum;
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

    public function executeStrategy(array $numbers): int {
        return $this->strategy->sum($numbers);
    }
}

// Usage
$numbers = [1, 2, 3, 4, 5, 6];
$strategy = new SumEvenSquaresStrategy();
$numberSum = new NumberSum($strategy);
echo $numberSum->executeStrategy($numbers); // Output: 56
?>
```