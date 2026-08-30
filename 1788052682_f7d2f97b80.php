```php
<?php

// Problem: Create a function to sort an array of integers using the QuickSort algorithm.

// Design Pattern: Strategy

class SortStrategy {
    public function sort($array) {
        return $array;
    }
}

class QuickSortStrategy extends SortStrategy {
    public function sort($array) {
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

    public function sort($array) {
        return $this->sortStrategy->sort($array);
    }
}

// Usage
$array = [3, 6, 8, 10, 1, 2, 1];
$context = new SortContext(new QuickSortStrategy());
$sortedArray = $context->sort($array);
print_r($sortedArray);
?>
```