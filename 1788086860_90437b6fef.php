```php
<?php
// Random Programming Problem: Create a function that takes an array of integers and returns the sum of all even numbers.

// Design Pattern: Strategy Pattern

// Strategy Interface
interface SumStrategy {
    public function calculate($numbers);
}

// Concrete Strategy for Summing Even Numbers
class SumEvenStrategy implements SumStrategy {
    public function calculate($numbers) {
        $sum = 0;
        foreach ($numbers as $number) {
            if ($number % 2 == 0) {
                $sum += $number;
            }
        }
        return $sum;
    }
}

// Context
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
$context = new SumContext(new SumEvenStrategy());
echo "Sum of even numbers: " . $context->executeStrategy($numbers);
?>
```