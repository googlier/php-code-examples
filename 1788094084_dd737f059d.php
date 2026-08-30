```php
<?php

// Randomly generated problem: Create a function to sort an array of integers in ascending order using the QuickSort algorithm.

// Design Pattern: Strategy

// Strategy Interface
interface SortStrategy {
    public function sort(array $array): array;
}

// Concrete Strategy: QuickSort
class QuickSortStrategy implements SortStrategy {
    public function sort(array $array): array {
        if (count($array) <= 1) {
            return $array;
        }

        $pivot = array_shift($array);
        $left = [];
        $right = [];

        foreach ($array as $element) {
            if ($element < $pivot) {
                $left[] = $element;
            } else {
                $right[] = $element;
            }
        }

        return array_merge($this->sort($left), [$pivot], $this->sort($right));
    }
}

// Context
class ArraySorter {
    private $sortStrategy;

    public function setSortStrategy(SortStrategy $sortStrategy) {
        $this->sortStrategy = $sortStrategy;
    }

    public function sort(array $array): array {
        return $this->sortStrategy->sort($array);
    }
}

// Usage
$sorter = new ArraySorter();
$sorter->setSortStrategy(new QuickSortStrategy());
$array = [3, 6, 8, 10, 1, 2, 1];
$sortedArray = $sorter->sort($array);

print_r($sortedArray);
?>
```