```php
<?php
// Problem: Implement a function to find the maximum sum of a contiguous subarray in a given array of integers.

// Design Pattern: Kadane's Algorithm

class MaxSubarraySum {
    public function maxSubArraySum($arr) {
        $max_current = $max_global = $arr[0];
        for ($i = 1; $i < count($arr); $i++) {
            $max_current = max($arr[$i], $max_current + $arr[$i]);
            if ($max_current > $max_global) {
                $max_global = $max_current;
            }
        }
        return $max_global;
    }
}

// Usage
$arr = [-2, -3, 4, -1, -2, 1, 5, -3];
$maxSubarray = new MaxSubarraySum();
echo "Maximum contiguous sum is " . $maxSubarray->maxSubArraySum($arr);
?>
```