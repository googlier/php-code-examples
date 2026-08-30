```php
<?php
// Problem: Implement a function to find the maximum sum of a subarray of a given size 'k' in an array of integers.

// Design Pattern: Factory Method

class SubarraySumCalculator {
    public function calculate($arr, $k) {
        return $this->maxSubarraySum($arr, $k);
    }

    protected function maxSubarraySum($arr, $k) {
        $n = count($arr);
        if ($n < $k) {
            return -1; // Invalid input
        }
        $windowSum = array_sum(array_slice($arr, 0, $k));
        $maxSum = $windowSum;
        for ($i = $k; $i < $n; $i++) {
            $windowSum += $arr[$i] - $arr[$i - $k];
            $maxSum = max($maxSum, $windowSum);
        }
        return $maxSum;
    }
}

class SubarraySumCalculatorFactory {
    public static function create() {
        return new SubarraySumCalculator();
    }
}

// Usage
$calculator = SubarraySumCalculatorFactory::create();
$arr = [1, 4, 2, 10, 23, 3, 1, 0, 20];
$k = 4;
echo "Maximum sum of a subarray of size $k is: " . $calculator->calculate($arr, $k);
?>
```