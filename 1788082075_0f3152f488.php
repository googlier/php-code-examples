```php
<?php
// Problem: Implement a function that takes an array of integers and returns the second largest number.

// Design Pattern: Singleton

class SecondLargestFinder {
    private static $instance = null;
    private $numbers = [];

    private function __construct($numbers) {
        $this->numbers = $numbers;
        sort($this->numbers);
    }

    public static function getInstance($numbers) {
        if (self::$instance == null) {
            self::$instance = new SecondLargestFinder($numbers);
        }
        return self::$instance;
    }

    public function getSecondLargest() {
        if (count($this->numbers) < 2) {
            throw new Exception("Array must contain at least two elements.");
        }
        return $this->numbers[count($this->numbers) - 2];
    }
}

$numbers = [3, 5, 2, 8, 1, 9, 4];
$finder = SecondLargestFinder::getInstance($numbers);
echo $finder->getSecondLargest(); // Output: 8
?>
```