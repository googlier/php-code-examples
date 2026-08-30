```php
<?php

// Problem: Implement a function to sort an array of integers using the Bubble Sort algorithm

// Design Pattern: Strategy Pattern

// Define the Strategy interface
interface SortStrategy {
    public function sort(array $array): array;
}

// Implement the Bubble Sort strategy
class BubbleSortStrategy implements SortStrategy {
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

// Implement the Context class
class Context {
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
$array = [64, 34, 25, 12, 22, 11, 90];
$context = new Context(new BubbleSortStrategy());
$sortedArray = $context->sort($array);
print_r($sortedArray);

?>
```