```php
<?php
// Problem: Create a function to calculate the nth Fibonacci number using the Singleton design pattern

class Fibonacci {
    private static $instance = null;
    private $cache = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Fibonacci();
        }
        return self::$instance;
    }

    public function getFibonacci($n) {
        if ($n <= 1) {
            return $n;
        }
        if (!isset($this->cache[$n])) {
            $this->cache[$n] = $this->getFibonacci($n - 1) + $this->getFibonacci($n - 2);
        }
        return $this->cache[$n];
    }
}

$number = 10;
echo Fibonacci::getInstance()->getFibonacci($number);
?>
```