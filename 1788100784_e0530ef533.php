```php
<?php
// Problem: Implement a function to find the most frequent element in an array.

// Design Pattern: Strategy

interface FrequentElementStrategy {
    public function findMostFrequent($array);
}

class MaxCountStrategy implements FrequentElementStrategy {
    public function findMostFrequent($array) {
        $frequency = array_count_values($array);
        arsort($frequency);
        reset($frequency);
        return key($frequency);
    }
}

class ModeStrategy implements FrequentElementStrategy {
    public function findMostFrequent($array) {
        $frequency = array_count_values($array);
        $maxFrequency = max($frequency);
        return array_keys($frequency, $maxFrequency);
    }
}

class FrequentElementFinder {
    private $strategy;

    public function __construct(FrequentElementStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function find($array) {
        return $this->strategy->findMostFrequent($array);
    }
}

// Usage
$array = [1, 2, 2, 3, 3, 3, 4, 4, 4, 4];
$strategy = new MaxCountStrategy();
$finder = new FrequentElementFinder($strategy);
echo $finder->find($array);
?>
```