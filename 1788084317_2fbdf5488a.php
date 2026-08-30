```php
<?php

// Define the interface for the strategy
interface SortStrategy {
    public function sort(array $data): array;
}

// Define a concrete strategy for bubble sort
class BubbleSortStrategy implements SortStrategy {
    public function sort(array $data): array {
        $n = count($data);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($data[$j] > $data[$j + 1]) {
                    // Swap elements
                    $temp = $data[$j];
                    $data[$j] = $data[$j + 1];
                    $data[$j + 1] = $temp;
                }
            }
        }
        return $data;
    }
}

// Define a context that uses a sorting strategy
class SortContext {
    private $sortStrategy;

    public function __construct(SortStrategy $sortStrategy) {
        $this->sortStrategy = $sortStrategy;
    }

    public function setSortStrategy(SortStrategy $sortStrategy): void {
        $this->sortStrategy = $sortStrategy;
    }

    public function sortData(array $data): array {
        return $this->sortStrategy->sort($data);
    }
}

// Usage
$data = [34, 7, 23, 32, 5, 62];
$sortContext = new SortContext(new BubbleSortStrategy());
$sortedData = $sortContext->sortData($data);
print_r($sortedData);

?>
```