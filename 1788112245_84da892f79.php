```php
<?php
// Problem: Implement a function to find the most frequent element in an array.

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
        foreach ($array as $value) {
            if (isset($this->frequencyMap[$value])) {
                $this->frequencyMap[$value]++;
            } else {
                $this->frequencyMap[$value] = 1;
            }
        }

        arsort($this->frequencyMap);
        reset($this->frequencyMap);
        return key($this->frequencyMap);
    }
}

// Usage
$array = [1, 3, 2, 1, 4, 1, 3, 3, 4, 2, 2, 2];
$finder = FrequencyFinder::getInstance();
$mostFrequent = $finder->findMostFrequent($array);
echo "The most frequent element is: " . $mostFrequent;
?>
```