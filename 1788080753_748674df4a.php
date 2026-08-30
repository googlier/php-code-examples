```php
<?php
// Random Programming Problem: Create a function that takes an array of integers and returns the sum of the even numbers.

// Random Design Pattern: Strategy Pattern

// Context
class SumEvenNumbers {
    private $strategy;

    public function __construct(ISumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function execute($numbers) {
        return $this->strategy->sumEven($numbers);
    }
}

// Strategy Interface
interface ISumStrategy {
    public function sumEven($numbers);
}

// Concrete Strategy
class EvenSumStrategy implements ISumStrategy {
    public function sumEven($numbers) {
        return array_sum(array_filter($numbers, function($num) {
            return $num % 2 === 0;
        }));
    }
}

// Usage
$numbers = [1, 2, 3, 4, 5, 6];
$strategy = new EvenSumStrategy();
$context = new SumEvenNumbers($strategy);
echo $context->execute($numbers); // Output: 12
?>
```