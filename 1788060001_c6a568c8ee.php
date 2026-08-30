```php
<?php
// Generate a random programming problem and solve it using a random design pattern

// Problem: Implement a function that takes an array of integers and returns the second largest number in the array.

// Design Pattern: Factory Method

class NumberFinder {
    public function findSecondLargest($numbers) {
        if (count($numbers) < 2) {
            throw new Exception("Array must contain at least two numbers.");
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

class NumberFinderFactory {
    public static function createNumberFinder() {
        return new NumberFinder();
    }
}

// Usage
$numbers = [10, 20, 30, 40, 50];
$numberFinder = NumberFinderFactory::createNumberFinder();
echo $numberFinder->findSecondLargest($numbers); // Output: 40
?>
```