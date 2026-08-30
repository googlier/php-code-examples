```php
<?php

// Problem: Generate a function that takes an array of integers and returns a new array containing only the even numbers.

// Design Pattern: Strategy

// Strategy Interface
interface FilterStrategy {
    public function filter($array);
}

// Concrete Strategy for Even Numbers
class EvenNumberFilter implements FilterStrategy {
    public function filter($array) {
        return array_filter($array, function($num) {
            return $num % 2 == 0;
        });
    }
}

// Context
class ArrayFilter {
    private $strategy;

    public function __construct(FilterStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(FilterStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function filterArray($array) {
        return $this->strategy->filter($array);
    }
}

// Usage
$numbers = [1, 2, 3, 4, 5, 6];
$evenFilter = new EvenNumberFilter();
$context = new ArrayFilter($evenFilter);
$evenNumbers = $context->filterArray($numbers);

print_r($evenNumbers); // Output: Array ( [1] => 2 [3] => 4 [5] => 6 )

?>
```