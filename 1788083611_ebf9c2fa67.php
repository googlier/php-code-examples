```php
<?php
// Problem: Implement a function to find the maximum sum of a contiguous subarray in a given array of integers.

// Design Pattern: Kadane's Algorithm

function maxSubArraySum($array) {
    $maxCurrent = $maxGlobal = $array[0];
    for ($i = 1; $i < count($array); $i++) {
        $maxCurrent = max($array[$i], $maxCurrent + $array[$i]);
        if ($maxCurrent > $maxGlobal) {
            $maxGlobal = $maxCurrent;
        }
    }
    return $maxGlobal;
}

// Example usage:
$exampleArray = [-2, 1, -3, 4, -1, 2, 1, -5, 4];
echo maxSubArraySum($exampleArray); // Output: 6
?>
```