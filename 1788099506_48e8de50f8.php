```php
<?php

// Problem: Implement a function that finds the maximum sum of a contiguous subarray within a one-dimensional array of numbers.

// Design Pattern: Kadane's Algorithm

class MaxSubarraySum {
    public static function findMaxSubarraySum($arr) {
        $maxSoFar = PHP_INT_MIN;
        $maxEndingHere = 0;

        foreach ($arr as $i => $value) {
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
$testArray = [-2, 1, -3, 4, -1, 2, 1, -5, 4];
echo "Maximum contiguous sum is: " . MaxSubarraySum::findMaxSubarraySum($testArray);

?>
```