```php
<?php
// Problem: Implement a function that takes an array of integers and returns the maximum sum of a contiguous subarray using Kadane's Algorithm

// Design Pattern: Strategy Pattern

// Interface for the strategy
interface SumStrategy {
    public function calculateSum($array);
}

// Concrete strategy for Kadane's Algorithm
class KadaneSumStrategy implements SumStrategy {
    public function calculateSum($array) {
        $maxCurrent = $maxGlobal = $array[0];
        for ($i = 1; $i < count($array); $i++) {
            $maxCurrent = max($array[$i], $maxCurrent + $array[$i]);
            if ($maxCurrent > $maxGlobal) {
                $maxGlobal = $maxCurrent;
            }
        }
        return $maxGlobal;
    }
}

// Context class
class ArraySumCalculator {
    private $strategy;

    public function __construct(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function calculateSum($array) {
        return $this->strategy->calculateSum($array);
    }
}

// Usage
$array = [-2, 1, -3, 4, -1, 2, 1, -5, 4];
$calculator = new ArraySumCalculator(new KadaneSumStrategy());
echo "Maximum contiguous sum is " . $calculator->calculateSum($array);
?>
```