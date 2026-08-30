```php
<?php

// Problem: Implement a function to sort an array of integers using the Bubble Sort algorithm.

// Solution: Bubble Sort is a simple comparison-based sorting algorithm. It repeatedly steps through the list, compares adjacent elements and swaps them if they are in the wrong order.

// Design Pattern: Factory Method

class SortAlgorithm {
    public function sort($array) {
        throw new Exception("Sorting method not implemented");
    }
}

class BubbleSort extends SortAlgorithm {
    public function sort($array) {
        $n = count($array);
        for ($i = 0; $i < $n-1; $i++) {
            for ($j = 0; $j < $n-$i-1; $j++) {
                if ($array[$j] > $array[$j+1]) {
                    // Swap elements
                    $temp = $array[$j];
                    $array[$j] = $array[$j+1];
                    $array[$j+1] = $temp;
                }
            }
        }
        return $array;
    }
}

class SortFactory {
    public static function getSortAlgorithm($type) {
        switch ($type) {
            case 'bubble':
                return new BubbleSort();
            default:
                throw new Exception("Unknown sort type");
        }
    }
}

// Usage
$array = [64, 34, 25, 12, 22, 11, 90];
$sortFactory = new SortFactory();
$sortAlgorithm = $sortFactory->getSortAlgorithm('bubble');
$sortedArray = $sortAlgorithm->sort($array);
print_r($sortedArray);

?>
```