```php
<?php
// Problem: Implement a function to filter an array of integers, returning only those that are divisible by a given divisor.

// Design Pattern: Strategy

interface FilterStrategy {
    public function filter(array $numbers): array;
}

class DivisibleByStrategy implements FilterStrategy {
    private $divisor;

    public function __construct($divisor) {
        $this->divisor = $divisor;
    }

    public function filter(array $numbers): array {
        return array_filter($numbers, function($number) {
            return $number % $this->divisor === 0;
        });
    }
}

class NumberFilter {
    private $strategy;

    public function __construct(FilterStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function filterNumbers(array $numbers): array {
        return $this->strategy->filter($numbers);
    }
}

// Usage
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$divisor = 3;
$strategy = new DivisibleByStrategy($divisor);
$filter = new NumberFilter($strategy);
$filteredNumbers = $filter->filterNumbers($numbers);

print_r($filteredNumbers);
?>
```