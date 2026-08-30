```php
<?php
// Problem: Implement a function that takes an array of integers and returns the sum of all even numbers in the array.

// Design Pattern: Strategy

interface SumStrategy {
    public function sum($numbers);
}

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

class SumContext {
    private $strategy;

    public function __construct(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function executeStrategy($numbers) {
        return $this->strategy->sum($numbers);
    }
}

// Usage
$numbers = [1, 2, 3, 4, 5, 6];
$strategy = new EvenSumStrategy();
$context = new SumContext($strategy);
echo $context->executeStrategy($numbers); // Output: 12
?>
```