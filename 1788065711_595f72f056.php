```php
<?php

// Problem: Implement a function that calculates the nth Fibonacci number using the Singleton design pattern.

class Fibonacci {
    private static $instance = null;
    private $memo = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Fibonacci();
        }
        return self::$instance;
    }

    public function calculate($n) {
        if ($n <= 0) {
            return 0;
        } elseif ($n == 1) {
            return 1;
        } elseif (isset($this->memo[$n])) {
            return $this->memo[$n];
        } else {
            $this->memo[$n] = $this->calculate($n - 1) + $this->calculate($n - 2);
            return $this->memo[$n];
        }
    }
}

// Usage
$n = 10;
$fib = Fibonacci::getInstance();
echo "Fibonacci number at position $n is: " . $fib->calculate($n);

?>
```