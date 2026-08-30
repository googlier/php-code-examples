```php
<?php
// Problem: Create a program that calculates the sum of all prime numbers up to a given number 'n'.

// Design Pattern: Singleton Pattern

class PrimeCalculator {
    private static $instance = null;

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new PrimeCalculator();
        }
        return self::$instance;
    }

    public function sumOfPrimes($n) {
        $sum = 0;
        for ($num = 2; $num <= $n; $num++) {
            if ($this->isPrime($num)) {
                $sum += $num;
            }
        }
        return $sum;
    }

    private function isPrime($num) {
        if ($num <= 1) {
            return false;
        }
        for ($i = 2; $i <= sqrt($num); $i++) {
            if ($num % $i == 0) {
                return false;
            }
        }
        return true;
    }
}

$n = 100; // Example input
$calculator = PrimeCalculator::getInstance();
echo "Sum of primes up to $n is: " . $calculator->sumOfPrimes($n);
?>
```