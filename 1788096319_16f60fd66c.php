```php
<?php

// Problem: Implement a function to calculate the nth Fibonacci number using the Singleton design pattern.

class Fibonacci {
    private static $instance = null;
    private $fibArray = [0, 1];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Fibonacci();
        }
        return self::$instance;
    }

    public function calculate($n) {
        if ($n <= 1) {
            return $n;
        }

        for ($i = 2; $i <= $n; $i++) {
            $this->fibArray[$i] = $this->fibArray[$i - 1] + $this->fibArray[$i - 2];
        }

        return $this->fibArray[$n];
    }
}

$fib = Fibonacci::getInstance();
echo $fib->calculate(10); // Output: 55
?>
```