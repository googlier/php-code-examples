```php
<?php
// Problem: Create a function that takes an array of integers and returns the sum of the squares of the even numbers.

// Design Pattern: Strategy

// Strategy Interface
interface SquareSumStrategy {
    public function calculate($numbers);
}

// Concrete Strategy for Even Numbers
class EvenSquareSumStrategy implements SquareSumStrategy {
    public function calculate($numbers) {
        return array_sum(array_map(function($num) {
            return $num % 2 === 0 ? $num * $num : 0;
        }, $numbers));
    }
}

// Context
class SquareSumContext {
    private $strategy;

    public function __construct(SquareSumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(SquareSumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function execute($numbers) {
        return $this->strategy->calculate($numbers);
    }
}

// Usage
$numbers = [1, 2, 3, 4, 5, 6];
$context = new SquareSumContext(new EvenSquareSumStrategy());
echo $context->execute($numbers); // Output: 56
?>
```