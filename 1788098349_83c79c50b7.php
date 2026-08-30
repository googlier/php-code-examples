```php
<?php
// Problem: Generate a function that takes an array of integers and returns the sum of all even numbers in the array.

// Design Pattern: Strategy

// Context
class NumberProcessor {
    private $strategy;

    public function setStrategy($strategy) {
        $this->strategy = $strategy;
    }

    public function executeStrategy($numbers) {
        return $this->strategy->sumEvenNumbers($numbers);
    }
}

// Strategy Interface
interface SumStrategy {
    public function sumEvenNumbers($numbers);
}

// Concrete Strategy
class EvenSumStrategy implements SumStrategy {
    public function sumEvenNumbers($numbers) {
        $sum = 0;
        foreach ($numbers as $number) {
            if ($number % 2 == 0) {
                $sum += $number;
            }
        }
        return $sum;
    }
}

// Usage
$numbers = [1, 2, 3, 4, 5, 6];
$strategy = new EvenSumStrategy();
$processor = new NumberProcessor();
$processor->setStrategy($strategy);
echo $processor->executeStrategy($numbers);
?>
```