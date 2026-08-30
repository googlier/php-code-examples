```php
<?php

// Problem: Implement a function to find the maximum number in an array without using the built-in max() function.

// Design Pattern: Strategy

interface MaxFinderStrategy {
    public function findMax($array);
}

class LinearSearchMaxFinder implements MaxFinderStrategy {
    public function findMax($array) {
        if (empty($array)) {
            return null;
        }
        $max = $array[0];
        foreach ($array as $value) {
            if ($value > $max) {
                $max = $value;
            }
        }
        return $max;
    }
}

class BinarySearchMaxFinder implements MaxFinderStrategy {
    public function findMax($array) {
        if (empty($array)) {
            return null;
        }
        sort($array);
        return end($array);
    }
}

class MaxFinder {
    private $strategy;

    public function __construct(MaxFinderStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(MaxFinderStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function findMax($array) {
        return $this->strategy->findMax($array);
    }
}

// Usage
$array = [3, 5, 1, 2, 4];
$maxFinder = new MaxFinder(new LinearSearchMaxFinder());
echo "Max using Linear Search: " . $maxFinder->findMax($array) . "\n";

$maxFinder->setStrategy(new BinarySearchMaxFinder());
echo "Max using Binary Search: " . $maxFinder->findMax($array) . "\n";

?>
```