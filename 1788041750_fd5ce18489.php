```php
<?php

// Generate a random problem: Implement a function to sort an array of integers in ascending order.

// Random design pattern: Strategy

interface SortStrategy {
    public function sort(array $array): array;
}

class BubbleSortStrategy implements SortStrategy {
    public function sort(array $array): array {
        $n = count($array);
        for ($i = 0; $i < $n; $i++) {
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

class QuickSortStrategy implements SortStrategy {
    public function sort(array $array): array {
        if (count($array) <= 1) {
            return $array;
        }
        $pivot = array_shift($array);
        $left = [];
        $right = [];
        foreach ($array as $value) {
            if ($value < $pivot) {
                $left[] = $value;
            } else {
                $right[] = $value;
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

    public function setSortStrategy(SortStrategy $sortStrategy): void {
        $this->sortStrategy = $sortStrategy;
    }

    public function sort(array $array): array {
        return $this->sortStrategy->sort($array);
    }
}

// Usage
$context = new SortContext(new BubbleSortStrategy());
$array = [5, 3, 8, 4, 2];
$sortedArray = $context->sort($array);
print_r($sortedArray);

$context->setSortStrategy(new QuickSortStrategy());
$sortedArray = $context->sort($array);
print_r($sortedArray);

?>
```