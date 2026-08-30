```php
<?php
// Problem: Implement a function that takes an array of integers and returns a new array containing only the even numbers from the original array.

// Design Pattern: Strategy

interface FilterStrategy {
    public function filter(array $numbers): array;
}

class EvenFilterStrategy implements FilterStrategy {
    public function filter(array $numbers): array {
        return array_filter($numbers, function($number) {
            return $number % 2 === 0;
        });
    }
}

class OddFilterStrategy implements FilterStrategy {
    public function filter(array $numbers): array {
        return array_filter($numbers, function($number) {
            return $number % 2 !== 0;
        });
    }
}

class NumberFilter {
    private $strategy;

    public function __construct(FilterStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function filter(array $numbers): array {
        return $this->strategy->filter($numbers);
    }
}

$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$evenFilter = new NumberFilter(new EvenFilterStrategy());
$evenNumbers = $evenFilter->filter($numbers);

print_r($evenNumbers);
?>
```