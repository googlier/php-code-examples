```php
<?php

// Problem: Implement a function that takes an array of integers and returns the maximum sum of any contiguous subarray.

// Design Pattern: Singleton

class MaxSubarraySum {
    private static $instance = null;
    private $maxSum = 0;

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new MaxSubarraySum();
        }
        return self::$instance;
    }

    public function getMaxSum($nums) {
        $maxCurrent = $maxGlobal = $nums[0];
        for ($i = 1; $i < count($nums); $i++) {
            $maxCurrent = max($nums[$i], $maxCurrent + $nums[$i]);
            if ($maxCurrent > $maxGlobal) {
                $maxGlobal = $maxCurrent;
            }
        }
        $this->maxSum = $maxGlobal;
    }

    public function getMaxSumValue() {
        return $this->maxSum;
    }
}

// Usage
$nums = array(-2, 1, -3, 4, -1, 2, 1, -5, 4);
$maxSubarraySum = MaxSubarraySum::getInstance();
$maxSubarraySum->getMaxSum($nums);
echo "Maximum Subarray Sum: " . $maxSubarraySum->getMaxSumValue();
?>
```