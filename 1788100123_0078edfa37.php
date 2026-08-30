```php
<?php

// Problem: Implement a function to sort an array of integers using the Bubble Sort algorithm.

// Design Pattern: Strategy Pattern

class BubbleSort {
    public function sort($array) {
        $n = count($array);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($array[$j] > $array[$j + 1]) {
                    $temp = $array[$j];
                    $array[$j] = $array[$j + 1];
                    $array[$j + 1] = $temp;
                }
            }
        }
        return $array;
    }
}

class ArraySorter {
    private $sortStrategy;

    public function setSortStrategy($sortStrategy) {
        $this->sortStrategy = $sortStrategy;
    }

    public function sort($array) {
        return $this->sortStrategy->sort($array);
    }
}

// Usage
$arraySorter = new ArraySorter();
$bubbleSort = new BubbleSort();
$arraySorter->setSortStrategy($bubbleSort);

$array = [64, 34, 25, 12, 22, 11, 90];
$sortedArray = $arraySorter->sort($array);

print_r($sortedArray);
?>
```