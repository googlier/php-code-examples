```php
<?php

// Problem: Implement a function to calculate the nth Fibonacci number using the Singleton design pattern

class FibonacciSingleton {
    private static $instance = null;
    private $memo = array();

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new FibonacciSingleton();
        }
        return self::$instance;
    }

    public function fibonacci($n) {
        if ($n <= 1) {
            return $n;
        }
        if (!array_key_exists($n, $this->memo)) {
            $this->memo[$n] = $this->fibonacci($n - 1) + $this->fibonacci($n - 2);
        }
        return $this->memo[$n];
    }
}

$n = 10;
$fibInstance = FibonacciSingleton::getInstance();
echo "Fibonacci number at position $n is: " . $fibInstance->fibonacci($n);

?>
```