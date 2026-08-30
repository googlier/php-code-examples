```php
<?php
// Problem: Implement a function that takes an array of integers and returns the sum of all even numbers that are greater than 10.

// Design Pattern: Strategy

// Strategy Interface
interface SumStrategy {
    public function execute($numbers);
}

// Concrete Strategy: SumEvenGreaterThanTenStrategy
class SumEvenGreaterThanTenStrategy implements SumStrategy {
    public function execute($numbers) {
        $sum = 0;
        foreach ($numbers as $number) {
            if ($number > 10 && $number % 2 == 0) {
                $sum += $number;
            }
        }
        return $sum;
    }
}

// Context
class NumberSumContext {
    private $strategy;

    public function __construct(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function executeStrategy($numbers) {
        return $this->strategy->execute($numbers);
    }
}

// Usage
$numbers = [5, 12, 8, 17, 24, 3, 19];
$strategy = new SumEvenGreaterThanTenStrategy();
$context = new NumberSumContext($strategy);
echo $context->executeStrategy($numbers); // Output: 40
?>
```