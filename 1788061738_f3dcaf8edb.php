```php
<?php

// Problem: Implement a function to sort an array of integers using the QuickSort algorithm.

// Design Pattern: Strategy

interface SortStrategy {
    public function sort(array $array): array;
}

class QuickSortStrategy implements SortStrategy {
    public function sort(array $array): array {
        if (count($array) < 2) {
            return $array;
        }
        $pivot = array_shift($array);
        $left = [];
        $right = [];
        foreach ($array as $item) {
            if ($item <= $pivot) {
                $left[] = $item;
            } else {
                $right[] = $item;
            }
        }
        return array_merge($this->sort($left), [$pivot], $this->sort($right));
    }
}

class ArraySorter {
    private $sortStrategy;

    public function __construct(SortStrategy $sortStrategy) {
        $this->sortStrategy = $sortStrategy;
    }

    public function sort(array $array): array {
        return $this->sortStrategy->sort($array);
    }
}

// Usage
$numbers = [3, 6, 8, 10, 1, 2, 1];
$sortStrategy = new QuickSortStrategy();
$arraySorter = new ArraySorter($sortStrategy);
$sortedNumbers = $arraySorter->sort($numbers);

print_r($sortedNumbers);

?>
```