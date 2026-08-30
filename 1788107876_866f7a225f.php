```php
<?php

// Problem: Implement a function to filter an array of integers, returning only those that are odd.

// Design Pattern: Strategy

interface FilterStrategy {
    public function filter(array $numbers): array;
}

class OddFilterStrategy implements FilterStrategy {
    public function filter(array $numbers): array {
        return array_filter($numbers, function($number) {
            return $number % 2 !== 0;
        });
    }
}

class NumberFilter {
    private $filterStrategy;

    public function __construct(FilterStrategy $filterStrategy) {
        $this->filterStrategy = $filterStrategy;
    }

    public function filter(array $numbers): array {
        return $this->filterStrategy->filter($numbers);
    }
}

// Usage
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$oddFilterStrategy = new OddFilterStrategy();
$numberFilter = new NumberFilter($oddFilterStrategy);
$oddNumbers = $numberFilter->filter($numbers);

print_r($oddNumbers);

?>
```