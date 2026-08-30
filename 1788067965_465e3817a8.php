```php
<?php
// Generate a random programming problem and solve it using a random design pattern
// Problem: Create a function to sort an array of strings by their length in ascending order.
// Design Pattern: Strategy

class SortStrategy {
    public function sort($array) {
        return $array;
    }
}

class LengthSortStrategy extends SortStrategy {
    public function sort($array) {
        usort($array, function($a, $b) {
            return strlen($a) - strlen($b);
        });
        return $array;
    }
}

class ArraySorter {
    private $strategy;

    public function __construct(SortStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(SortStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function sort($array) {
        return $this->strategy->sort($array);
    }
}

// Usage
$array = ["apple", "banana", "cherry", "date"];
$sorter = new ArraySorter(new LengthSortStrategy());
$sortedArray = $sorter->sort($array);
print_r($sortedArray);
?>
```