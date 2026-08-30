```php
<?php

// Problem: Create a function that takes an array of integers and returns the largest number that is divisible by 3.

// Solution: Singleton Design Pattern

class LargestDivisibleByThree {
    private static $instance = null;
    private $array;

    private function __construct($array) {
        $this->array = $array;
    }

    public static function getInstance($array) {
        if (self::$instance == null) {
            self::$instance = new LargestDivisibleByThree($array);
        }
        return self::$instance;
    }

    public function getLargestDivisibleByThree() {
        $maxNumber = null;
        foreach ($this->array as $number) {
            if ($number % 3 == 0 && (is_null($maxNumber) || $number > $maxNumber)) {
                $maxNumber = $number;
            }
        }
        return $maxNumber;
    }
}

// Example usage:
$array = [10, 15, 20, 25, 30];
$instance = LargestDivisibleByThree::getInstance($array);
echo "Largest number divisible by 3: " . $instance->getLargestDivisibleByThree();
?>
```