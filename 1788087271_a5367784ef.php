```php
<?php
// Random Programming Problem: Implement a function to sort an array of integers using the Bubble Sort algorithm.

// Random Design Pattern: Strategy Pattern

// Define the Strategy interface
interface SortStrategy {
    public function sort($array);
}

// Implement the Bubble Sort strategy
class BubbleSortStrategy implements SortStrategy {
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

// Implement the Context class
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
$array = [4, 2, 9, 6, 23, 12, 34, 0, 1];
$sortContext = new SortContext(new BubbleSortStrategy());
$sortedArray = $sortContext->sort($array);
print_r($sortedArray);
?>
```