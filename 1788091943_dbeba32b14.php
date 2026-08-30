```php
<?php
// Problem: Implement a function that takes an array of integers and returns a new array with each element doubled.

// Design Pattern: Strategy Pattern

// Define the strategy interface
interface DoublingStrategy {
    public function double($number);
}

// Implement the strategy for doubling
class DoubleStrategy implements DoublingStrategy {
    public function double($number) {
        return $number * 2;
    }
}

// Context class to use the strategy
class NumberDoubler {
    private $strategy;

    public function __construct(DoublingStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function doubleArray($numbers) {
        $doubledNumbers = [];
        foreach ($numbers as $number) {
            $doubledNumbers[] = $this->strategy->double($number);
        }
        return $doubledNumbers;
    }
}

// Usage
$numbers = [1, 2, 3, 4, 5];
$strategy = new DoubleStrategy();
$doubler = new NumberDoubler($strategy);
$doubledNumbers = $doubler->doubleArray($numbers);

print_r($doubledNumbers);
?>
```