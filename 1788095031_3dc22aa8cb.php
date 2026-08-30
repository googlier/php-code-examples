```php
<?php
// Problem: Implement a function that sorts an array of integers using the Bubble Sort algorithm

// Design Pattern: Strategy

class SortStrategy {
    public function sort($array) {
        throw new Exception("This method should be overridden.");
    }
}

class BubbleSortStrategy extends SortStrategy {
    public function sort($array) {
        $n = count($array);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($array[$j] > $array[$j + 1]) {
                    // swap $array[$j] and $array[$j+1]
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
$array = [64, 34, 25, 12, 22, 11, 90];
$sorter = new ArraySorter(new BubbleSortStrategy());
$sortedArray = $sorter->sort($array);
print_r($sortedArray);
?>
```