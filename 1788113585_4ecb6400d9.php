```php
<?php
// Problem: Implement a function that finds the second smallest number in an array of integers. The function should return the second smallest number, or null if there is no such number.

// Design Pattern: Singleton

class SecondSmallestFinder {
    private static $instance = null;
    private $smallest;
    private $secondSmallest;

    private function __construct() {
        $this->smallest = PHP_INT_MAX;
        $this->secondSmallest = PHP_INT_MAX;
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new SecondSmallestFinder();
        }
        return self::$instance;
    }

    public function addNumber($number) {
        if ($number < $this->smallest) {
            $this->secondSmallest = $this->smallest;
            $this->smallest = $number;
        } elseif ($number > $this->smallest && $number < $this->secondSmallest) {
            $this->secondSmallest = $number;
        }
    }

    public function getSecondSmallest() {
        if ($this->secondSmallest == PHP_INT_MAX) {
            return null;
        }
        return $this->secondSmallest;
    }
}

// Usage
$finder = SecondSmallestFinder::getInstance();
$numbers = [4, 2, 9, 7, 5, 1];
foreach ($numbers as $number) {
    $finder->addNumber($number);
}
echo $finder->getSecondSmallest(); // Output: 2
?>
```