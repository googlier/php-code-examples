```php
<?php
// Problem: Generate a function to find the nth Fibonacci number using the Singleton design pattern

class Fibonacci {
    private static $instance = null;
    private $memo = array();

    private function __construct() {}

    public static function getInstance() {
        if (is_null(self::$instance)) {
            self::$instance = new Fibonacci();
        }
        return self::$instance;
    }

    public function fibonacci($n) {
        if ($n <= 0) return 0;
        if ($n == 1) return 1;
        if (!isset($this->memo[$n])) {
            $this->memo[$n] = $this->fibonacci($n - 1) + $this->fibonacci($n - 2);
        }
        return $this->memo[$n];
    }
}

$n = 10;
$fib = Fibonacci::getInstance();
echo "Fibonacci number at position $n is: " . $fib->fibonacci($n);
?>
```