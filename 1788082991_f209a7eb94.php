```php
<?php
// Problem: Implement a function that takes an array of integers and returns the largest product of any three numbers in the array.

// Design Pattern: Strategy Pattern

// Strategy Interface
interface ProductStrategy {
    public function calculateProduct($numbers);
}

// Concrete Strategy: MaxProductStrategy
class MaxProductStrategy implements ProductStrategy {
    public function calculateProduct($numbers) {
        sort($numbers);
        $n = count($numbers);
        return max($numbers[$n-1] * $numbers[$n-2] * $numbers[$n-3], $numbers[0] * $numbers[1] * $numbers[$n-1]);
    }
}

// Context
class LargestProductCalculator {
    private $strategy;

    public function setStrategy(ProductStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function calculate($numbers) {
        return $this->strategy->calculateProduct($numbers);
    }
}

// Usage
$numbers = [1, 10, -5, 1, -100];
$calculator = new LargestProductCalculator();
$calculator->setStrategy(new MaxProductStrategy());
echo $calculator->calculate($numbers);
?>
```