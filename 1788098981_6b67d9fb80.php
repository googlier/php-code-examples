```php
<?php

// Problem: Implement a function to find the most frequent element in an array.

// Design Pattern: Singleton Pattern

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

    public function addElement($element) {
        if (array_key_exists($element, $this->frequencyMap)) {
            $this->frequencyMap[$element]++;
        } else {
            $this->frequencyMap[$element] = 1;
        }
    }

    public function getMostFrequent() {
        $maxFrequency = 0;
        $mostFrequentElement = null;

        foreach ($this->frequencyMap as $element => $frequency) {
            if ($frequency > $maxFrequency) {
                $maxFrequency = $frequency;
                $mostFrequentElement = $element;
            }
        }

        return $mostFrequentElement;
    }
}

// Usage
$finder = FrequencyFinder::getInstance();
$finder->addElement(1);
$finder->addElement(2);
$finder->addElement(1);
$finder->addElement(3);
$finder->addElement(2);
$finder->addElement(1);

echo $finder->getMostFrequent(); // Output: 1
?>
```