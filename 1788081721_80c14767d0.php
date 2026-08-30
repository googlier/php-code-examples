```php
<?php

// Problem: Implement a function to find the maximum sum of a contiguous subarray in an array of integers.

// Design Pattern: Factory Method

class SubarraySumCalculator {
    public static function createCalculator($array) {
        return new KadaneSubarraySumCalculator($array);
    }
}

interface SubarraySumCalculatorInterface {
    public function calculateMaxSum();
}

class KadaneSubarraySumCalculator implements SubarraySumCalculatorInterface {
    private $array;
    private $maxSoFar;
    private $maxEndingHere;

    public function __construct($array) {
        $this->array = $array;
        $this->maxSoFar = PHP_INT_MIN;
        $this->maxEndingHere = 0;
    }

    public function calculateMaxSum() {
        foreach ($this->array as $value) {
            $this->maxEndingHere += $value;
            if ($this->maxSoFar < $this->maxEndingHere) {
                $this->maxSoFar = $this->maxEndingHere;
            }
            if ($this->maxEndingHere < 0) {
                $this->maxEndingHere = 0;
            }
        }
        return $this->maxSoFar;
    }
}

// Usage
$array = [-2, 1, -3, 4, -1, 2, 1, -5, 4];
$calculator = SubarraySumCalculator::createCalculator($array);
echo "Maximum sum of contiguous subarray: " . $calculator->calculateMaxSum();

?>
```