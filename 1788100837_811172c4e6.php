```php
<?php
// Generate a random programming problem and solve it using a random design pattern

// Problem: Implement a function that takes an array of integers and returns the maximum sum of any contiguous subarray.
// Design Pattern: Kadane's Algorithm

function maxSubArray($nums) {
    $maxCurrent = $maxGlobal = $nums[0];
    for ($i = 1; $i < count($nums); $i++) {
        $maxCurrent = max($nums[$i], $maxCurrent + $nums[$i]);
        if ($maxCurrent > $maxGlobal) {
            $maxGlobal = $maxCurrent;
        }
    }
    return $maxGlobal;
}

// Test the function
$nums = [-2, 1, -3, 4, -1, 2, 1, -5, 4];
echo maxSubArray($nums); // Output: 6
?>
```