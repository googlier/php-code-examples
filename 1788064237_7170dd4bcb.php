```php
<?php

// Random Programming Problem:
// Create a function that takes an array of integers and returns the sum of the squares of the even numbers.

// Random Design Pattern Used: Strategy Pattern

// Define the Strategy Interface
interface NumberProcessorStrategy {
    public function process($number);
}

// Implement the Strategy for Sum of Squares of Even Numbers
class SumOfSquaresOfEvenNumbersStrategy implements NumberProcessorStrategy {
    public function process($number) {
        if ($number % 2 === 0) {
            return $number * $number;
        }
        return 0;
    }
}

// Implement the Context
class NumberProcessor {
    private $strategy;

    public function __construct(NumberProcessorStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function processNumbers($numbers) {
        $sum = 0;
        foreach ($numbers as $number) {
            $sum += $this->strategy->process($number);
        }
        return $sum;
    }
}

// Usage
$numbers = [1, 2, 3, 4, 5, 6];
$strategy = new SumOfSquaresOfEvenNumbersStrategy();
$numberProcessor = new NumberProcessor($strategy);
echo $numberProcessor->processNumbers($numbers); // Output: 56
?>
```