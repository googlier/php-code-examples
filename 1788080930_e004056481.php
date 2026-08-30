```php
<?php
// Problem: Implement a function to calculate the nth Fibonacci number using the Flyweight design pattern.

// Class to represent a Fibonacci number
class Fibonacci {
    private $value;

    public function __construct($value) {
        $this->value = $value;
    }

    public function getValue() {
        return $this->value;
    }
}

// Flyweight factory class
class FibonacciFlyweightFactory {
    private static $fibonacciMap = [];

    public static function getFibonacci($n) {
        if (!isset(self::$fibonacciMap[$n])) {
            if ($n <= 1) {
                self::$fibonacciMap[$n] = new Fibonacci($n);
            } else {
                $first = self::getFibonacci($n - 1);
                $second = self::getFibonacci($n - 2);
                self::$fibonacciMap[$n] = new Fibonacci($first->getValue() + $second->getValue());
            }
        }
        return self::$fibonacciMap[$n];
    }
}

// Main function to calculate the nth Fibonacci number
function fibonacci($n) {
    return FibonacciFlyweightFactory::getFibonacci($n)->getValue();
}

// Test the function
$n = 10;
echo "The {$n}th Fibonacci number is: " . fibonacci($n);
?>
```