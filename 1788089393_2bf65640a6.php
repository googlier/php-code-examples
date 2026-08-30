```php
<?php

// Problem: Implement a function that finds the second largest number in an array of integers.

// Solution: Using Factory Method Design Pattern

// Define the interface
interface NumberFinder {
    public function findSecondLargest($numbers);
}

// Implement the Concrete Factory
class NumberFinderFactory {
    public static function createNumberFinder($type) {
        switch ($type) {
            case 'Simple':
                return new SimpleNumberFinder();
            case 'Optimized':
                return new OptimizedNumberFinder();
            default:
                throw new Exception('Invalid NumberFinder type');
        }
    }
}

// Implement the Concrete Product
class SimpleNumberFinder implements NumberFinder {
    public function findSecondLargest($numbers) {
        rsort($numbers);
        return $numbers[1];
    }
}

// Implement the Concrete Product
class OptimizedNumberFinder implements NumberFinder {
    public function findSecondLargest($numbers) {
        $max1 = PHP_INT_MIN;
        $max2 = PHP_INT_MIN;

        foreach ($numbers as $num) {
            if ($num > $max1) {
                $max2 = $max1;
                $max1 = $num;
            } elseif ($num > $max2 && $num != $max1) {
                $max2 = $num;
            }
        }

        return $max2;
    }
}

// Usage
$numbers = [5, 3, 9, 1, 10, 15];
$finder = NumberFinderFactory::createNumberFinder('Optimized');
echo $finder->findSecondLargest($numbers); // Output: 15

?>
```