```php
<?php
// Problem: Implement a function to find the second largest number in an array

// Design Pattern: Singleton

class NumberFinder {
    private static $instance = null;
    private $numbers;

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new NumberFinder();
        }
        return self::$instance;
    }

    public function setNumbers($numbers) {
        $this->numbers = $numbers;
    }

    public function findSecondLargest() {
        if (count($this->numbers) < 2) {
            return null;
        }
        $first = $second = PHP_INT_MIN;
        foreach ($this->numbers as $num) {
            if ($num > $first) {
                $second = $first;
                $first = $num;
            } elseif ($num > $second && $num != $first) {
                $second = $num;
            }
        }
        return $second;
    }
}

// Usage
$numbers = [3, 5, 1, 2, 4, 8, 7];
$finder = NumberFinder::getInstance();
$finder->setNumbers($numbers);
echo $finder->findSecondLargest(); // Output: 7
?>
```