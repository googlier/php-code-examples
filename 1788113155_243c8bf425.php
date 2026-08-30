```php
<?php
// Problem: Implement a function to find the maximum sum of a subarray of size k in a given array of integers.

// Design Pattern: Factory Method

interface ArrayProcessor {
    public function calculateMaxSum($array, $k);
}

class SlidingWindowProcessor implements ArrayProcessor {
    public function calculateMaxSum($array, $k) {
        $n = count($array);
        if ($n < $k) {
            return "Invalid";
        }
        $maxSum = PHP_INT_MIN, windowSum = 0;
        for ($i = 0; $i < $n; $i++) {
            windowSum += $array[$i];
            if ($i >= $k - 1) {
                $maxSum = max($maxSum, $windowSum);
                windowSum -= $array[$i - $k + 1];
            }
        }
        return $maxSum;
    }
}

class ArrayProcessorFactory {
    public static function getProcessor($type) {
        switch ($type) {
            case 'SlidingWindow':
                return new SlidingWindowProcessor();
            default:
                throw new Exception("Unknown processor type");
        }
    }
}

// Usage
$k = 3;
$array = [1, 4, 2, 10, 23, 3, 5, 7, 1];
$processor = ArrayProcessorFactory::getProcessor('SlidingWindow');
echo $processor->calculateMaxSum($array, $k);
?>
```