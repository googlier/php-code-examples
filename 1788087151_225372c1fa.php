```php
<?php
// Problem: Implement a function to calculate the nth Fibonacci number using the Singleton design pattern

class Fibonacci {
    private static $instance = null;
    private static $cache = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Fibonacci();
        }
        return self::$instance;
    }

    public function calculate($n) {
        if (isset(self::$cache[$n])) {
            return self::$cache[$n];
        }

        if ($n <= 1) {
            return $n;
        }

        $result = self::getInstance()->calculate($n - 1) + self::getInstance()->calculate($n - 2);
        self::$cache[$n] = $result;

        return $result;
    }
}

// Usage
$n = 10;
echo "Fibonacci number at position $n is " . Fibonacci::getInstance()->calculate($n);
?>
```