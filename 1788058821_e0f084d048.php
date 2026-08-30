```php
<?php

// Problem: Implement a function to find the maximum sum of a subarray within a one-dimensional array of numbers.

class MaxSubarraySum {
    private $array;

    public function __construct($array) {
        $this->array = $array;
    }

    public function findMaxSum() {
        $maxSoFar = PHP_INT_MIN;
        $maxEndingHere = 0;

        foreach ($this->array as $value) {
            $maxEndingHere += $value;
            if ($maxSoFar < $maxEndingHere) {
                $maxSoFar = $maxEndingHere;
            }
            if ($maxEndingHere < 0) {
                $maxEndingHere = 0;
            }
        }

        return $maxSoFar;
    }
}

// Example usage:
$array = array(-2, -3, 4, -1, -2, 1, 5, -3);
$maxSum = (new MaxSubarraySum($array))->findMaxSum();
echo "Maximum subarray sum is " . $maxSum;
?>
```