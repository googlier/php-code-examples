```php
<?php
// Problem: Implement a function that calculates the sum of all even numbers in an array.

// Design Pattern: Strategy

// Interface for sum calculation strategies
interface SumStrategy {
    public function calculateSum($numbers);
}

// Concrete strategy for sum of even numbers
class EvenSumStrategy implements SumStrategy {
    public function calculateSum($numbers) {
        $sum = 0;
        foreach ($numbers as $number) {
            if ($number % 2 == 0) {
                $sum += $number;
            }
        }
        return $sum;
    }
}

// Context class that uses a strategy
class NumberSumContext {
    private $strategy;

    public function __construct(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function executeStrategy($numbers) {
        return $this->strategy->calculateSum($numbers);
    }
}

// Example usage
$numbers = [1, 2, 3, 4, 5, 6];
$strategy = new EvenSumStrategy();
$context = new NumberSumContext($strategy);
echo $context->executeStrategy($numbers); // Output: 12
?>
```