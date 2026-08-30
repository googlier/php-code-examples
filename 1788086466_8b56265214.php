```php
<?php
// Problem: Implement a function to calculate the Fibonacci sequence up to the nth term using the Singleton design pattern.

class FibonacciGenerator {
    private static $instance;
    private $sequence = [0, 1];

    private function __construct() {}

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getSequence($n) {
        if ($n < count($this->sequence)) {
            return array_slice($this->sequence, 0, $n);
        }
        while (count($this->sequence) < $n) {
            $next = $this->sequence[count($this->sequence) - 1] + $this->sequence[count($this->sequence) - 2];
            $this->sequence[] = $next;
        }
        return $this->sequence;
    }
}

// Usage
$generator = FibonacciGenerator::getInstance();
$n = 10;
echo implode(', ', $generator->getSequence($n));
?>
```