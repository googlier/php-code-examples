```php
<?php
// Problem: Implement a function to find the largest number in an array without using the built-in max function.

// Design Pattern: Strategy

interface FindMaxStrategy {
    public function findMax($array);
}

class LinearSearchStrategy implements FindMaxStrategy {
    public function findMax($array) {
        $max = PHP_INT_MIN;
        foreach ($array as $number) {
            if ($number > $max) {
                $max = $number;
            }
        }
        return $max;
    }
}

class BinarySearchStrategy implements FindMaxStrategy {
    public function findMax($array) {
        sort($array);
        return end($array);
    }
}

class MaxFinder {
    private $strategy;

    public function __construct(FindMaxStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function findMax($array) {
        return $this->strategy->findMax($array);
    }
}

// Usage
$array = [3, 5, 1, 8, 2, 9, 4];
$strategy = new LinearSearchStrategy();
$maxFinder = new MaxFinder($strategy);
echo "Max Number: " . $maxFinder->findMax($array);
?>
```