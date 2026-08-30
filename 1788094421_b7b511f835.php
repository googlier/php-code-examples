```php
<?php
// Problem: Implement a function to find the second largest number in an array of integers.

// Design Pattern: Singleton Pattern

class SecondLargestFinder {
    private static $instance = null;
    private $numbers = [];

    private function __construct($numbers) {
        $this->numbers = $numbers;
    }

    public static function getInstance($numbers) {
        if (self::$instance === null) {
            self::$instance = new SecondLargestFinder($numbers);
        }
        return self::$instance;
    }

    public function findSecondLargest() {
        $first = PHP_INT_MIN;
        $second = PHP_INT_MIN;
        foreach ($this->numbers as $number) {
            if ($number > $first) {
                $second = $first;
                $first = $number;
            } elseif ($number > $second && $number != $first) {
                $second = $number;
            }
        }
        return $second;
    }
}

// Usage
$numbers = [4, 2, 9, 1, 7, 5];
$finder = SecondLargestFinder::getInstance($numbers);
echo $finder->findSecondLargest(); // Output: 7
?>
```