```php
<?php
// Problem: Implement a function that takes an array of integers and returns the sum of the even numbers

// Design Pattern: Strategy Pattern

// Interface for the strategy
interface SumStrategy {
    public function sum($numbers);
}

// Concrete strategy for summing even numbers
class EvenSumStrategy implements SumStrategy {
    public function sum($numbers) {
        $sum = 0;
        foreach ($numbers as $number) {
            if ($number % 2 == 0) {
                $sum += $number;
            }
        }
        return $sum;
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

    public function sum($numbers) {
        return $this->strategy->sum($numbers);
    }
}

// Usage
$numbers = [1, 2, 3, 4, 5, 6];
$context = new NumberSum(new EvenSumStrategy());
echo $context->sum($numbers); // Output: 12
?>
```