```php
<?php
// Problem: Implement a function to filter an array of strings, returning only those that contain a specific substring.
// Design Pattern: Strategy Pattern

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

class FilterContext {
    private $strategy;

    public function setStrategy(FilterStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function filter(array $items, string $substring): array {
        return $this->strategy->filter($items, $substring);
    }
}

// Usage
$items = ["apple", "banana", "grape", "berry", "apricot"];
$substring = "ap";
$strategy = new ContainsSubstringStrategy();
$context = new FilterContext();
$context->setStrategy($strategy);
$filteredItems = $context->filter($items, $substring);

print_r($filteredItems);
?>
```