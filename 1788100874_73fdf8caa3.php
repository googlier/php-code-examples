```php
<?php
// Problem: Implement a function that takes an array of integers and returns a new array with each element multiplied by 2.

// Design Pattern: Strategy Pattern

// Strategy Interface
interface ArrayProcessor {
    public function process($array);
}

// Concrete Strategy: MultiplyByTwo
class MultiplyByTwo implements ArrayProcessor {
    public function process($array) {
        return array_map(function($item) {
            return $item * 2;
        }, $array);
    }
}

// Context
class ArrayProcessorContext {
    private $strategy;

    public function __construct(ArrayProcessor $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(ArrayProcessor $strategy) {
        $this->strategy = $strategy;
    }

    public function processArray($array) {
        return $this->strategy->process($array);
    }
}

// Usage
$context = new ArrayProcessorContext(new MultiplyByTwo());
$inputArray = [1, 2, 3, 4, 5];
$outputArray = $context->processArray($inputArray);
print_r($outputArray);
?>
```