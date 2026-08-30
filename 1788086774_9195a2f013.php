```php
<?php
// Define a random programming problem
// Problem: Implement a function to calculate the sum of all even numbers in a given array

// Generate a random design pattern
// Design Pattern: Strategy

// Define a strategy interface
interface SumStrategy {
    public function sumEvenNumbers(array $numbers): int;
}

// Implement a concrete strategy
class EvenSumStrategy implements SumStrategy {
    public function sumEvenNumbers(array $numbers): int {
        return array_sum(array_filter($numbers, function($number) {
            return $number % 2 === 0;
        }));
    }
}

// Define a context class
class SumContext {
    private $strategy;

    public function __construct(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function executeStrategy(array $numbers): int {
        return $this->strategy->sumEvenNumbers($numbers);
    }
}

// Generate a random array
$numbers = range(1, 10);

// Create a context object with a concrete strategy
$context = new SumContext(new EvenSumStrategy());

// Execute the strategy and output the result
echo $context->executeStrategy($numbers);
?>
```