```php
<?php
// Problem: Create a function to calculate the nth Fibonacci number using the Singleton design pattern.

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
        if ($n <= 1) {
            return $n;
        }
        if (!isset($this->memo[$n])) {
            $this->memo[$n] = $this->calculate($n - 1) + $this->calculate($n - 2);
        }
        return $this->memo[$n];
    }
}

$n = 10; // Change this value to calculate a different Fibonacci number
echo Fibonacci::getInstance()->calculate($n);
?>
```