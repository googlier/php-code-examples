```php
<?php

// Generate a random programming problem and solve it using a random design pattern

// Problem: Implement a function to find the maximum sum of a subarray within a given array.

// Design Pattern: Kadane's Algorithm

function maxSubArray($nums) {
    $max_current = $max_global = $nums[0];
    for ($i = 1; $i < count($nums); $i++) {
        $max_current = max($nums[$i], $max_current + $nums[$i]);
        if ($max_current > $max_global) {
            $max_global = $max_current;
        }
    }
    return $max_global;
}

// Test the function
$nums = [-2, 1, -3, 4, -1, 2, 1, -5, 4];
echo "Maximum subarray sum is " . maxSubArray($nums);
?>
```