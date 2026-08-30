```php
<?php
// Problem: Implement a function that takes an array of integers and returns the sum of all even numbers in the array using the Strategy pattern.

// Define the Strategy interface
interface SumStrategy {
    public function sumEvenNumbers($numbers);
}

// Implement the ConcreteStrategy class for summing even numbers
class EvenSumStrategy implements SumStrategy {
    public function sumEvenNumbers($numbers) {
        return array_sum(array_filter($numbers, function($num) {
            return $num % 2 == 0;
        }));
    }
}

// Implement the Context class
class NumberProcessor {
    private $strategy;

    public function __construct(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function processNumbers($numbers) {
        return $this->strategy->sumEvenNumbers($numbers);
    }
}

// Usage
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$strategy = new EvenSumStrategy();
$processor = new NumberProcessor($strategy);
echo $processor->processNumbers($numbers); // Output: 30
?>
```