```php
<?php

// Problem: Implement a function that takes an array of integers and returns the sum of the even numbers.
// Use the Strategy pattern to implement different sorting strategies for the array.

// Define the Strategy interface
interface SortStrategy {
    public function sort($array);
}

// Implement the BubbleSort strategy
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

// Implement the QuickSort strategy
class QuickSort implements SortStrategy {
    public function sort($array) {
        if (count($array) <= 1) {
            return $array;
        }
        $pivot = array_shift($array);
        $less = [];
        $greater = [];
        foreach ($array as $value) {
            if ($value <= $pivot) {
                $less[] = $value;
            } else {
                $greater[] = $value;
            }
        }
        return array_merge($this->sort($less), [$pivot], $this->sort($greater));
    }
}

// Context class using the Strategy pattern
class Context {
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

// Main function to solve the problem
function sumEvenNumbers($array) {
    $context = new Context(new BubbleSort());
    $sortedArray = $context->sort($array);
    $sum = 0;
    foreach ($sortedArray as $number) {
        if ($number % 2 == 0) {
            $sum += $number;
        }
    }
    return $sum;
}

// Example usage
$array = [1, 3, 5, 2, 4, 6];
echo sumEvenNumbers($array); // Output: 12
?>
```