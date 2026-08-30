```php
<?php
// Problem: Implement a function to find the maximum sum of a contiguous subarray within a one-dimensional array of numbers.

// Solution: Using Kadane's Algorithm, which is a dynamic programming approach.

function maxSubArraySum($arr) {
    $maxSoFar = PHP_INT_MIN;
    $maxEndingHere = 0;

    foreach ($arr as $value) {
        $maxEndingHere = max($value, $maxEndingHere + $value);
        $maxSoFar = max($maxSoFar, $maxEndingHere);
    }

    return $maxSoFar;
}

// Example usage:
$array = [-2, 1, -3, 4, -1, 2, 1, -5, 4];
echo maxSubArraySum($array); // Output: 6
?>
```