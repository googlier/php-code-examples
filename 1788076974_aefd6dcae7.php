```php
<?php
// Problem: Implement a function to find the maximum sum of a contiguous subarray in an array of integers.

// Design Pattern: Kadane's Algorithm

function maxSubArraySum($array) {
    $max_current = $max_global = $array[0];
    for ($i = 1; $i < count($array); $i++) {
        $max_current = max($array[$i], $max_current + $array[$i]);
        if ($max_current > $max_global) {
            $max_global = $max_current;
        }
    }
    return $max_global;
}

// Example usage:
$array = [-2, 1, -3, 4, -1, 2, 1, -5, 4];
echo maxSubArraySum($array); // Output: 6
?>
```