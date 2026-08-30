```php
<?php
// Problem: Implement a function to find the nth Fibonacci number using the Singleton design pattern.

class Fibonacci {
    private static $instance = null;
    private $memo = array();

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Fibonacci();
        }
        return self::$instance;
    }

    public function getFibonacci($n) {
        if ($n <= 1) {
            return $n;
        }
        if (!array_key_exists($n, $this->memo)) {
            $this->memo[$n] = $this->getFibonacci($n - 1) + $this->getFibonacci($n - 2);
        }
        return $this->memo[$n];
    }
}

$n = 10;
echo "Fibonacci number at position $n is " . Fibonacci::getInstance()->getFibonacci($n);
?>
```