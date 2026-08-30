```php
<?php
// Problem: Implement a function that finds the maximum sum of a subarray of a given array of integers.

// Design Pattern: Singleton

class MaxSubarraySum {
    private static $instance = null;
    private $maxSum = 0;

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new MaxSubarraySum();
        }
        return self::$instance;
    }

    public function findMaxSum($arr) {
        $maxCurrent = $maxGlobal = $arr[0];
        for ($i = 1; $i < count($arr); $i++) {
            $maxCurrent = max($arr[$i], $maxCurrent + $arr[$i]);
            if ($maxCurrent > $maxGlobal) {
                $maxGlobal = $maxCurrent;
            }
        }
        $this->maxSum = $maxGlobal;
        return $this->maxSum;
    }
}

// Usage
$array = array(-2, -3, 4, -1, -2, 1, 5, -3);
echo MaxSubarraySum::getInstance()->findMaxSum($array); // Output: 7
?>
```