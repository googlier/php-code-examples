```php
<?php
// Problem: Create a function that takes an array of integers and returns a new array with all odd numbers removed.

// Design Pattern: Strategy

interface NumberFilterStrategy {
    public function filter(array $numbers): array;
}

class OddNumberFilter implements NumberFilterStrategy {
    public function filter(array $numbers): array {
        return array_filter($numbers, function($num) {
            return $num % 2 === 0;
        });
    }
}

class NumberFilterContext {
    private $strategy;

    public function __construct(NumberFilterStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(NumberFilterStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function filterNumbers(array $numbers): array {
        return $this->strategy->filter($numbers);
    }
}

$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$context = new NumberFilterContext(new OddNumberFilter());
$filteredNumbers = $context->filterNumbers($numbers);

print_r($filteredNumbers);
?>
```