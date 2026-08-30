```php
<?php
// Problem: Create a function that takes an array of integers and returns a new array with each element doubled.
// Use the Strategy design pattern to allow for different doubling strategies (e.g., normal, incremented, decremented).

// Strategy interface
interface DoublingStrategy {
    public function double($number);
}

// Normal doubling strategy
class NormalDoublingStrategy implements DoublingStrategy {
    public function double($number) {
        return $number * 2;
    }
}

// Incremented doubling strategy
class IncrementedDoublingStrategy implements DoublingStrategy {
    public function double($number) {
        return ($number * 2) + 1;
    }
}

// Decremented doubling strategy
class DecrementedDoublingStrategy implements DoublingStrategy {
    public function double($number) {
        return ($number * 2) - 1;
    }
}

// Context class
class DoublingContext {
    private $strategy;

    public function __construct(DoublingStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(DoublingStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function doubleArray($array) {
        $result = [];
        foreach ($array as $number) {
            $result[] = $this->strategy->double($number);
        }
        return $result;
    }
}

// Usage
$inputArray = [1, 2, 3, 4, 5];
$context = new DoublingContext(new NormalDoublingStrategy());
$result = $context->doubleArray($inputArray);
print_r($result); // Output: [2, 4, 6, 8, 10]

$context->setStrategy(new IncrementedDoublingStrategy());
$result = $context->doubleArray($inputArray);
print_r($result); // Output: [3, 5, 7, 9, 11]

$context->setStrategy(new DecrementedDoublingStrategy());
$result = $context->doubleArray($inputArray);
print_r($result); // Output: [1, 3, 5, 7, 9]
?>
```