```php
<?php
// Problem: Implement a function to find the largest number in an array without using the built-in max function.

// Design Pattern: Strategy Pattern

// Strategy Interface
interface LargestNumberStrategy {
    public function findLargestNumber(array $numbers);
}

// Concrete Strategy
class SimpleIterationStrategy implements LargestNumberStrategy {
    public function findLargestNumber(array $numbers) {
        if (empty($numbers)) {
            return null;
        }
        $largest = $numbers[0];
        foreach ($numbers as $number) {
            if ($number > $largest) {
                $largest = $number;
            }
        }
        return $largest;
    }
}

// Context
class LargestNumberFinder {
    private $strategy;

    public function __construct(LargestNumberStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(LargestNumberStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function findLargestNumber(array $numbers) {
        return $this->strategy->findLargestNumber($numbers);
    }
}

// Usage
$strategy = new SimpleIterationStrategy();
$finder = new LargestNumberFinder($strategy);
$numbers = [3, 5, 1, 8, 2, 9];
echo "Largest Number: " . $finder->findLargestNumber($numbers);
?>
```