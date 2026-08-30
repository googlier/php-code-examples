```php
<?php

// Problem: Implement a function to sort an array of integers using a random sorting algorithm.

// Design Pattern: Strategy

interface SortStrategy {
    public function sort(array $array): array;
}

class BubbleSort implements SortStrategy {
    public function sort(array $array): array {
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

class QuickSort implements SortStrategy {
    public function sort(array $array): array {
        if (count($array) <= 1) {
            return $array;
        }
        $pivot = array_shift($array);
        $left = [];
        $right = [];
        foreach ($array as $item) {
            if ($item < $pivot) {
                $left[] = $item;
            } else {
                $right[] = $item;
            }
        }
        return array_merge($this->sort($left), [$pivot], $this->sort($right));
    }
}

class SortContext {
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
$numbers = [3, 1, 4, 1, 5, 9, 2, 6, 5, 3, 5];
$sortContext = new SortContext(new BubbleSort());
$sortedNumbers = $sortContext->sort($numbers);
print_r($sortedNumbers);

// Change strategy to QuickSort
$sortContext->setSortStrategy(new QuickSort());
$sortedNumbers = $sortContext->sort($numbers);
print_r($sortedNumbers);

?>
```