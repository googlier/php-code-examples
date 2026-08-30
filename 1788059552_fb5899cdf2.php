```php
<?php
// Problem: Implement a function to sort an array of integers using the Bubble Sort algorithm

// Design Pattern: Strategy Pattern

// Strategy Interface
interface SortStrategy {
    public function sort(array $data): array;
}

// Bubble Sort Algorithm
class BubbleSortStrategy implements SortStrategy {
    public function sort(array $data): array {
        $n = count($data);
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($data[$j] > $data[$j + 1]) {
                    $temp = $data[$j];
                    $data[$j] = $data[$j + 1];
                    $data[$j + 1] = $temp;
                }
            }
        }
        return $data;
    }
}

// Context
class ArraySorter {
    private $sortStrategy;

    public function __construct(SortStrategy $sortStrategy) {
        $this->sortStrategy = $sortStrategy;
    }

    public function sort(array $data): array {
        return $this->sortStrategy->sort($data);
    }
}

// Usage
$data = [64, 34, 25, 12, 22, 11, 90];
$sorter = new ArraySorter(new BubbleSortStrategy());
$sortedData = $sorter->sort($data);
print_r($sortedData);
?>
```