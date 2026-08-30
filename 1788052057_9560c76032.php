```php
<?php
// Random Problem: Generate a function that takes an array of integers and returns the sum of all even numbers in the array.

// Random Design Pattern: Strategy

interface SumStrategy {
    public function calculate($numbers);
}

class EvenSumStrategy implements SumStrategy {
    public function calculate($numbers) {
        return array_sum(array_filter($numbers, function($num) {
            return $num % 2 == 0;
        }));
    }
}

class OddSumStrategy implements SumStrategy {
    public function calculate($numbers) {
        return array_sum(array_filter($numbers, function($num) {
            return $num % 2 != 0;
        }));
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

    public function executeStrategy($numbers) {
        return $this->strategy->calculate($numbers);
    }
}

// Usage
$numbers = [1, 2, 3, 4, 5, 6];
$context = new SumContext(new EvenSumStrategy());
echo "Sum of even numbers: " . $context->executeStrategy($numbers) . "\n";

$context->setStrategy(new OddSumStrategy());
echo "Sum of odd numbers: " . $context->executeStrategy($numbers) . "\n";
?>
```