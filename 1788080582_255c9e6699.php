```php
<?php

// Generate a random programming problem
$problem = "Create a function that calculates the sum of all even numbers in an array.";

// Generate a random design pattern
$pattern = "Strategy Pattern";

// Generate a random function name
$functionName = "sumEvenNumbers";

// Generate a random array of numbers
$numbers = range(1, 20);
shuffle($numbers);

// Generate a random array of even numbers
$evenNumbers = array_filter($numbers, function($num) {
    return $num % 2 === 0;
});

// Implement the Strategy Pattern
interface SumStrategy {
    public function sum(array $numbers);
}

class EvenSumStrategy implements SumStrategy {
    public function sum(array $numbers) {
        return array_sum($numbers);
    }
}

class SumContext {
    private $strategy;

    public function __construct(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function executeStrategy(array $numbers) {
        return $this->strategy->sum($numbers);
    }
}

// Solve the problem using the generated design pattern
$evenSumStrategy = new EvenSumStrategy();
$sumContext = new SumContext($evenSumStrategy);
$result = $sumContext->executeStrategy($evenNumbers);

echo "The sum of all even numbers in the array is: " . $result;

?>
```