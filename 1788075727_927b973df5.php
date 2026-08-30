```php
<?php

// Problem: Implement a function to sort an array of integers using the QuickSort algorithm

// Solution using the Strategy design pattern

// Define the strategy interface
interface SortStrategy {
    public function sort(array $array): array;
}

// Implement the QuickSort algorithm
class QuickSort implements SortStrategy {
    public function sort(array $array): array {
        if (count($array) <= 1) {
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

// Implement the context class
class ArraySorter {
    private $sortStrategy;

    public function setSortStrategy(SortStrategy $sortStrategy): void {
        $this->sortStrategy = $sortStrategy;
    }

    public function sort(array $array): array {
        return $this->sortStrategy->sort($array);
    }
}

// Usage
$arraySorter = new ArraySorter();
$arraySorter->setSortStrategy(new QuickSort());
$array = [3, 6, 8, 10, 1, 2, 1];
$sortedArray = $arraySorter->sort($array);
print_r($sortedArray);

?>
```