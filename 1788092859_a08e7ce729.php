```php
<?php

// Problem: Implement a function to sort an array of integers using the QuickSort algorithm.

// Design Pattern: Use the Strategy pattern to allow for easy swapping out of the sorting algorithm.

interface SortStrategy {
    public function sort(array $array): array;
}

class QuickSortStrategy implements SortStrategy {
    public function sort(array $array): array {
        if (count($array) <= 1) {
            return $array;
        }

        $pivot = array_shift($array);
        $less = [];
        $greater = [];

        foreach ($array as $value) {
            if ($value <= $pivot) {
                $less[] = $value;
            } else {
                $greater[] = $value;
            }
        }

        return array_merge($this->sort($less), [$pivot], $this->sort($greater));
    }
}

class ArraySorter {
    private $sortStrategy;

    public function __construct(SortStrategy $sortStrategy) {
        $this->sortStrategy = $sortStrategy;
    }

    public function setSortStrategy(SortStrategy $sortStrategy) {
        $this->sortStrategy = $sortStrategy;
    }

    public function sort(array $array): array {
        return $this->sortStrategy->sort($array);
    }
}

// Usage
$array = [3, 6, 8, 10, 1, 2, 1];
$sorter = new ArraySorter(new QuickSortStrategy());
$sortedArray = $sorter->sort($array);
print_r($sortedArray);

?>
```