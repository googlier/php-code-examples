```php
<?php
// Problem: Generate a function to calculate the Fibonacci sequence up to a given number of terms using the Singleton design pattern

class Fibonacci {
    private static $instance = null;
    private $sequence = [];

    private function __construct() {
        $this->sequence[0] = 0;
        $this->sequence[1] = 1;
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Fibonacci();
        }
        return self::$instance;
    }

    public function getSequence($n) {
        if ($n > 1) {
            for ($i = 2; $i < $n; $i++) {
                $this->sequence[$i] = $this->sequence[$i - 1] + $this->sequence[$i - 2];
            }
        }
        return array_slice($this->sequence, 0, $n);
    }
}

// Usage
$fib = Fibonacci::getInstance();
echo implode(', ', $fib->getSequence(10));
?>
```