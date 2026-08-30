```php
<?php

// Problem: Implement a function that calculates the sum of all prime numbers up to a given number using the Singleton design pattern.

class PrimeSumCalculator {
    private static $instance = null;
    private $sum = 0;

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new PrimeSumCalculator();
        }
        return self::$instance;
    }

    public function isPrime($num) {
        if ($num <= 1) return false;
        if ($num == 2) return true;
        if ($num % 2 == 0) return false;
        for ($i = 3; $i <= sqrt($num); $i += 2) {
            if ($num % $i == 0) return false;
        }
        return true;
    }

    public function calculateSum($limit) {
        $this->sum = 0;
        for ($i = 2; $i <= $limit; $i++) {
            if ($this->isPrime($i)) {
                $this->sum += $i;
            }
        }
        return $this->sum;
    }
}

// Usage
$calculator = PrimeSumCalculator::getInstance();
echo $calculator->calculateSum(10); // Output: 17 (2 + 3 + 5 + 7)
?>
```