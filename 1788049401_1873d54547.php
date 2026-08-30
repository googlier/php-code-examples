```php
<?php
// Problem: Generate a function that takes an array of integers and returns the sum of all even numbers in the array.

// Design Pattern: Strategy Pattern

interface SumStrategy {
    public function sum(array $numbers);
}

class EvenSumStrategy implements SumStrategy {
    public function sum(array $numbers) {
        return array_sum(array_filter($numbers, function($num) {
            return $num % 2 === 0;
        }));
    }
}

class OddSumStrategy implements SumStrategy {
    public function sum(array $numbers) {
        return array_sum(array_filter($numbers, function($num) {
            return $num % 2 !== 0;
        }));
    }
}

class NumberProcessor {
    private $strategy;

    public function __construct(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function process(array $numbers) {
        return $this->strategy->sum($numbers);
    }
}

// Usage
$numbers = [1, 2, 3, 4, 5, 6];
$evenSumStrategy = new EvenSumStrategy();
$numberProcessor = new NumberProcessor($evenSumStrategy);
echo $numberProcessor->process($numbers); // Output: 12
?>
```