```php
<?php
// Problem: Implement a function that takes an array of integers and returns the sum of all even numbers.

// Design Pattern: Strategy

// Strategy Interface
interface SumStrategy {
    public function sum(array $numbers): int;
}

// Concrete Strategy for Summing Even Numbers
class EvenSumStrategy implements SumStrategy {
    public function sum(array $numbers): int {
        $sum = 0;
        foreach ($numbers as $number) {
            if ($number % 2 === 0) {
                $sum += $number;
            }
        }
        return $sum;
    }
}

// Context
class NumberProcessor {
    private $strategy;

    public function setStrategy(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function process(array $numbers): int {
        return $this->strategy->sum($numbers);
    }
}

// Usage
$numbers = [1, 2, 3, 4, 5, 6];
$processor = new NumberProcessor();
$processor->setStrategy(new EvenSumStrategy());
echo $processor->process($numbers); // Output: 12
?>
```