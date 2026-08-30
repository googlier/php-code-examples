```php
<?php
// Random Problem: Create a function that takes an array of integers and returns a new array with each element incremented by 10.

// Random Design Pattern: Strategy

// Define the Strategy interface
interface IncrementStrategy {
    public function increment($value);
}

// Implement the IncrementStrategy interface
class IncrementByTen implements IncrementStrategy {
    public function increment($value) {
        return $value + 10;
    }
}

// Define the Context class
class IncrementContext {
    private $strategy;

    public function __construct(IncrementStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function applyStrategy($value) {
        return $this->strategy->increment($value);
    }
}

// Usage
$numbers = [1, 2, 3, 4, 5];
$strategy = new IncrementByTen();
$context = new IncrementContext($strategy);

$result = array_map(function($number) use ($context) {
    return $context->applyStrategy($number);
}, $numbers);

print_r($result);
?>
```