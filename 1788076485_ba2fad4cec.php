```php
<?php

// Problem: Implement a function to sort an array of integers using the QuickSort algorithm.

// Design Pattern: Strategy

// Define the Strategy interface
interface SortStrategy {
    public function sort(array &$array);
}

// Implement the QuickSort algorithm as a concrete strategy
class QuickSortStrategy implements SortStrategy {
    public function sort(array &$array) {
        if (count($array) <= 1) {
            return;
        }
        $pivot = array_shift($array);
        $left = [];
        $right = [];
        foreach ($array as $value) {
            if ($value <= $pivot) {
                $left[] = $value;
            } else {
                $right[] = $value;
            }
        }
        $this->sort($left);
        $this->sort($right);
        $array = array_merge($left, [$pivot], $right);
    }
}

// Define the Context class that uses a SortStrategy
class Context {
    private $strategy;

    public function __construct(SortStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(SortStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function sort(array &$array) {
        $this->strategy->sort($array);
    }
}

// Usage
$array = [3, 6, 8, 10, 1, 2, 1];
$context = new Context(new QuickSortStrategy());
$context->sort($array);
print_r($array);
?>
```