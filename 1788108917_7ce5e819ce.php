```php
<?php

// Random Programming Problem:
// Implement a function that takes an array of integers and returns a new array containing only the even numbers from the original array, sorted in descending order.

// Random Design Pattern:
// Strategy Pattern

class FilterStrategy {
    public function filter(array $numbers): array {
        return $numbers;
    }
}

class EvenFilterStrategy extends FilterStrategy {
    public function filter(array $numbers): array {
        return array_filter($numbers, function($number) {
            return $number % 2 === 0;
        });
    }
}

class SortStrategy {
    public function sort(array $numbers): array {
        sort($numbers);
        return $numbers;
    }
}

class DescSortStrategy extends SortStrategy {
    public function sort(array $numbers): array {
        rsort($numbers);
        return $numbers;
    }
}

class NumberProcessor {
    private $filterStrategy;
    private $sortStrategy;

    public function __construct(FilterStrategy $filterStrategy, SortStrategy $sortStrategy) {
        $this->filterStrategy = $filterStrategy;
        $this->sortStrategy = $sortStrategy;
    }

    public function process(array $numbers): array {
        $filteredNumbers = $this->filterStrategy->filter($numbers);
        return $this->sortStrategy->sort($filteredNumbers);
    }
}

// Usage
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$evenFilter = new EvenFilterStrategy();
$descSort = new DescSortStrategy();
$numberProcessor = new NumberProcessor($evenFilter, $descSort);
$evenSortedNumbers = $numberProcessor->process($numbers);
print_r($evenSortedNumbers);

?>
```