```php
<?php
// Problem: Implement a function that takes an array of integers and returns the sum of all even numbers using the Singleton design pattern.

class EvenSumSingleton {
    private static $instance = null;
    private $sum = 0;

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new EvenSumSingleton();
        }
        return self::$instance;
    }

    public function addNumber($num) {
        if ($num % 2 == 0) {
            $this->sum += $num;
        }
    }

    public function getSum() {
        return $this->sum;
    }
}

function sumEvenNumbers($numbers) {
    $singleton = EvenSumSingleton::getInstance();
    foreach ($numbers as $number) {
        $singleton->addNumber($number);
    }
    return $singleton->getSum();
}

// Example usage
$numbers = [1, 2, 3, 4, 5, 6];
echo sumEvenNumbers($numbers); // Output: 12
?>
```