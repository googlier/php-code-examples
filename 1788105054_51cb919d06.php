```php
<?php

// Random Programming Problem: 
// Implement a function that takes an array of integers and returns a new array with each element being the sum of itself and the next element, excluding the last element.

// Solution using Strategy Design Pattern:
// Define a strategy interface
interface SumStrategy {
    public function calculate($array);
}

// Implement the strategy
class NextElementSumStrategy implements SumStrategy {
    public function calculate($array) {
        $result = [];
        for ($i = 0; $i < count($array) - 1; $i++) {
            $result[] = $array[$i] + $array[$i + 1];
        }
        return $result;
    }
}

// Context class using the strategy
class SumContext {
    private $strategy;

    public function __construct(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function executeStrategy($array) {
        return $this->strategy->calculate($array);
    }
}

// Usage
$array = [1, 2, 3, 4, 5];
$context = new SumContext(new NextElementSumStrategy());
$result = $context->executeStrategy($array);

print_r($result);

?>
```