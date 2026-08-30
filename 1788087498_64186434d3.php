```php
<?php
// Define the problem: Generate a function that takes an array of integers and returns a new array with each element doubled.

// Design Pattern: Strategy

// Define the Strategy Interface
interface ArrayProcessorStrategy {
    public function process($array);
}

// Implement the Strategy for Doubling
class DoubleArrayProcessor implements ArrayProcessorStrategy {
    public function process($array) {
        return array_map(function($value) {
            return $value * 2;
        }, $array);
    }
}

// Context class that uses a strategy
class ArrayProcessor {
    private $strategy;

    public function __construct(ArrayProcessorStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function process($array) {
        return $this->strategy->process($array);
    }
}

// Usage
$inputArray = [1, 2, 3, 4, 5];
$processor = new ArrayProcessor(new DoubleArrayProcessor());
$outputArray = $processor->process($inputArray);

print_r($outputArray); // Output: Array ( [0] => 2 [1] => 4 [2] => 6 [3] => 8 [4] => 10 )
?>
```