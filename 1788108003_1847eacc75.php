```php
<?php
// Problem: Implement a function to sort an array of integers using the Bubble Sort algorithm.

// Solution using the Strategy Design Pattern

// Define the Context class
class SortContext {
    private $strategy;

    public function __construct(SortStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function sort(array $data) {
        return $this->strategy->sort($data);
    }

    public function setStrategy(SortStrategy $strategy) {
        $this->strategy = $strategy;
    }
}

// Define the Strategy interface
interface SortStrategy {
    public function sort(array $data): array;
}

// Define the Bubble Sort strategy class
class BubbleSortStrategy implements SortStrategy {
    public function sort(array $data): array {
        $n = count($data);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($data[$j] > $data[$j + 1]) {
                    $temp = $data[$j];
                    $data[$j] = $data[$j + 1];
                    $data[$j + 1] = $temp;
                }
            }
        }
        return $data;
    }
}

// Usage
$data = [64, 34, 25, 12, 22, 11, 90];
$sortContext = new SortContext(new BubbleSortStrategy());
$sortedData = $sortContext->sort($data);
print_r($sortedData);
?>
```