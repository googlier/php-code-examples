```php
<?php

// Problem: Implement a function to filter an array of strings, returning only those that contain a specific substring.
// Design Pattern: Strategy

interface FilterStrategy {
    public function filter(array $items, string $substring): array;
}

class ContainsSubstringStrategy implements FilterStrategy {
    public function filter(array $items, string $substring): array {
        return array_filter($items, function($item) use ($substring) {
            return strpos($item, $substring) !== false;
        });
    }
}

class ArrayFilter {
    private $strategy;

    public function __construct(FilterStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function filter(array $items, string $substring): array {
        return $this->strategy->filter($items, $substring);
    }
}

$items = ["apple", "banana", "cherry", "date", "elderberry"];
$substring = "a";
$filter = new ArrayFilter(new ContainsSubstringStrategy());
$filteredItems = $filter->filter($items, $substring);

print_r($filteredItems);
?>
```