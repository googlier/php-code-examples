```php
<?php
// Problem: Implement a function that takes an array of integers and returns the maximum sum of a contiguous subarray.

// Design Pattern: Strategy

class MaxSubarrayStrategy {
    public function findMaxSubarray($arr) {
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

class MaxSubarrayProblem {
    public function solve($arr) {
        $strategy = new MaxSubarrayStrategy();
        return $strategy->findMaxSubarray($arr);
    }
}

// Example usage:
$arr = [-2, 1, -3, 4, -1, 2, 1, -5, 4];
$problem = new MaxSubarrayProblem();
echo $problem->solve($arr);
?>
```