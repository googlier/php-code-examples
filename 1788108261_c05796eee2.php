```php
<?php
// Problem: Implement a function to find the most frequent element in an array. If there are multiple elements with the same highest frequency, return all of them.

// Design Pattern: Strategy

class FrequencyStrategy {
    public function getMostFrequent($array) {
        $frequency = array_count_values($array);
        arsort($frequency);
        $maxFrequency = reset($frequency);
        return array_keys($frequency, $maxFrequency);
    }
}

class FrequencyCalculator {
    private $strategy;

    public function __construct(FrequencyStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function calculate($array) {
        return $this->strategy->getMostFrequent($array);
    }
}

// Usage
$array = [1, 2, 2, 3, 3, 3, 4, 4, 4, 4];
$strategy = new FrequencyStrategy();
$calculator = new FrequencyCalculator($strategy);
$result = $calculator->calculate($array);

echo "Most frequent elements: " . implode(", ", $result);
?>
```