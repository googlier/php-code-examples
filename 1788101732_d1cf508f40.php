```php
<?php
// Problem: Implement a function to sort an array of integers using the QuickSort algorithm.

// Design Pattern: Strategy

interface SortStrategy {
    public function sort(array $array): array;
}

class QuickSortStrategy implements SortStrategy {
    public function sort(array $array): array {
        if (count($array) <= 1) {
            return $array;
        }

        $left = $right = [];
        reset($array);
        $pivot_key = key($array);
        $pivot = array_shift($array);

        foreach ($array as $key => $value) {
            if ($value < $pivot) {
                $left[$key] = $value;
            } else {
                $right[$key] = $value;
            }
        }

        return array_merge($this->sort($left), [$pivot_key => $pivot], $this->sort($right));
    }
}

class ArraySorter {
    private $strategy;

    public function __construct(SortStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function sort(array $array): array {
        return $this->strategy->sort($array);
    }
}

// Usage
$array = [3, 6, 8, 10, 1, 2, 1];
$strategy = new QuickSortStrategy();
$sorter = new ArraySorter($strategy);
$sortedArray = $sorter->sort($array);

print_r($sortedArray);
?>
```