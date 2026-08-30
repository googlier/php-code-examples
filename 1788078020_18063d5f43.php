```php
<?php
// Problem: Implement a function to find the most frequent element in an array.
// Solution: Use the Singleton design pattern to ensure the function is only called once.

class FrequencyFinder {
    private static $instance = null;
    private $frequencyMap = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
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

        $maxFrequency = 0;
        $mostFrequent = null;
        foreach ($this->frequencyMap as $item => $frequency) {
            if ($frequency > $maxFrequency) {
                $maxFrequency = $frequency;
                $mostFrequent = $item;
            }
        }
        return $mostFrequent;
    }
}

// Usage
$finder = FrequencyFinder::getInstance();
$array = [1, 3, 2, 1, 4, 1, 3, 2, 3, 3, 4, 4, 4];
echo $finder->findMostFrequent($array); // Outputs: 3
?>
```