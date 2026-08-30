```php
<?php
// Problem: Implement a function to sort an array of integers using the Bubble Sort algorithm

// Design Pattern: Strategy

// Strategy Interface
interface SortStrategy {
    public function sort($array);
}

// Bubble Sort Concrete Strategy
class BubbleSort implements SortStrategy {
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

// Context
class ArraySorter {
    private $sortStrategy;

    public function setSortStrategy(SortStrategy $sortStrategy) {
        $this->sortStrategy = $sortStrategy;
    }

    public function sortArray($array) {
        return $this->sortStrategy->sort($array);
    }
}

// Usage
$sorter = new ArraySorter();
$sorter->setSortStrategy(new BubbleSort());
$array = [64, 34, 25, 12, 22, 11, 90];
$sortedArray = $sorter->sortArray($array);

print_r($sortedArray);
?>
```