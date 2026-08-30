```php
<?php
// Problem: Implement a function to calculate the nth Fibonacci number using the Singleton design pattern.

class Fibonacci {
    private static $instance = null;
    private $memo = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Fibonacci();
        }
        return self::$instance;
    }

    public function calculate($n) {
        if (isset($this->memo[$n])) {
            return $this->memo[$n];
        }

        if ($n <= 1) {
            return $n;
        }

        $this->memo[$n] = $this->calculate($n - 1) + $this->calculate($n - 2);
        return $this->memo[$n];
    }
}

// Usage
$n = 10;
$fib = Fibonacci::getInstance();
echo "The {$n}th Fibonacci number is: " . $fib->calculate($n);
?>
```