```php
<?php

// Random Problem: Implement a function to find the second largest number in an array.

// Design Pattern: Factory Method

class NumberFinder {
    public function findSecondLargest(array $numbers) {
        if (count($numbers) < 2) {
            return null;
        }
        
        $largest = PHP_INT_MIN;
        $secondLargest = PHP_INT_MIN;
        
        foreach ($numbers as $number) {
            if ($number > $largest) {
                $secondLargest = $largest;
                $largest = $number;
            } elseif ($number > $secondLargest && $number != $largest) {
                $secondLargest = $number;
            }
        }
        
        return $secondLargest;
    }
}

// Usage
$numbers = [5, 3, 8, 2, 10, 1];
$finder = new NumberFinder();
$secondLargest = $finder->findSecondLargest($numbers);
echo "The second largest number is: " . $secondLargest . "\n";

?>
```