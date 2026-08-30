```php
<?php

// Problem: Implement a function to find the second largest number in an array without using any built-in functions.

// Design Pattern: Strategy

interface NumberFinderStrategy {
    public function findSecondLargest($numbers);
}

class MaxSecondLargestStrategy implements NumberFinderStrategy {
    public function findSecondLargest($numbers) {
        $first = $second = PHP_INT_MIN;
        foreach ($numbers as $number) {
            if ($number > $first) {
                $second = $first;
                $first = $number;
            } elseif ($number > $second && $number != $first) {
                $second = $number;
            }
        }
        return $second;
    }
}

class ArrayProcessor {
    private $strategy;

    public function __construct(NumberFinderStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function process($numbers) {
        return $this->strategy->findSecondLargest($numbers);
    }
}

// Usage
$numbers = [3, 5, 1, 8, 2, 9, 4];
$strategy = new MaxSecondLargestStrategy();
$processor = new ArrayProcessor($strategy);
echo $processor->process($numbers); // Output: 8

?>
```