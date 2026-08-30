```php
<?php
// Define the problem
// Create a function that calculates the factorial of a given number using recursion.

// Define the solution using the Singleton design pattern
class Factorial {
    private static $instance = null;

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Factorial();
        }
        return self::$instance;
    }

    public function calculate($number) {
        if ($number <= 1) {
            return 1;
        } else {
            return $number * $this->calculate($number - 1);
        }
    }
}

// Test the function
$number = 5;
echo "Factorial of $number is: " . Factorial::getInstance()->calculate($number);
?>
```