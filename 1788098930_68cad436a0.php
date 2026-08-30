```php
<?php
// Problem: Implement a function to find the second largest number in an array.

// Design Pattern: Singleton

class SecondLargestFinder {
    private static $instance = null;
    private $numbers = [];

    private function __construct($numbers) {
        $this->numbers = $numbers;
    }

    public static function getInstance($numbers) {
        if (self::$instance == null) {
            self::$instance = new SecondLargestFinder($numbers);
        }
        return self::$instance;
    }

    public function findSecondLargest() {
        $max = PHP_INT_MIN;
        $secondMax = PHP_INT_MIN;

        foreach ($this->numbers as $number) {
            if ($number > $max) {
                $secondMax = $max;
                $max = $number;
            } elseif ($number > $secondMax && $number != $max) {
                $secondMax = $number;
            }
        }

        return $secondMax;
    }
}

$numbers = [3, 5, 2, 8, 1, 9, 4];
$finder = SecondLargestFinder::getInstance($numbers);
echo "The second largest number is: " . $finder->findSecondLargest();
?>
```