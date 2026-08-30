```php
<?php
// Problem: Implement a function that finds the most frequent element in an array.

// Solution: Factory Method Design Pattern

class FrequencyFinder {
    public static function findMostFrequent($array) {
        $frequencyMap = array_count_values($array);
        arsort($frequencyMap);
        return key($frequencyMap);
    }
}

// Usage
$array = [1, 3, 2, 1, 4, 1, 5, 3, 3];
echo FrequencyFinder::findMostFrequent($array);
?>
```