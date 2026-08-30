```php
<?php
// Problem: Implement a function that calculates the nth Fibonacci number using a Singleton design pattern.

class Fibonacci {
    private static $instance;
    private $memo = [];

    private function __construct() {}

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function calculate($n) {
        if ($n <= 1) {
            return $n;
        }
        if (!isset($this->memo[$n])) {
            $this->memo[$n] = $this->calculate($n - 1) + $this->calculate($n - 2);
        }
        return $this->memo[$n];
    }
}

$n = 10;
$fibonacci = Fibonacci::getInstance();
echo "Fibonacci number at position $n is: " . $fibonacci->calculate($n);
?>
```