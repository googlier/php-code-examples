```php
<?php

// Problem: Implement a function to find the most frequent element in an array

// Design Pattern: Singleton

class FrequencyFinder {
    private static $instance = null;
    private $frequencyMap = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new FrequencyFinder();
        }
        return self::$instance;
    }

    public function findMostFrequent($array) {
        foreach ($array as $item) {
            if (!isset($this->frequencyMap[$item])) {
                $this->frequencyMap[$item] = 0;
            }
            $this->frequencyMap[$item]++;
        }

        arsort($this->frequencyMap);
        reset($this->frequencyMap);
        return key($this->frequencyMap);
    }
}

// Usage
$finder = FrequencyFinder::getInstance();
$array = [1, 2, 3, 2, 2, 4, 5, 5, 5, 5];
$mostFrequent = $finder->findMostFrequent($array);
echo "Most frequent element: " . $mostFrequent;
?>
```