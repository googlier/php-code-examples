```php
<?php
// Problem: Implement a function that generates the first n numbers of the Fibonacci sequence using the Singleton design pattern.

// Solution:
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

    public function generate($n) {
        while (count($this->sequence) < $n) {
            $next = end($this->sequence) + $this->sequence[count($this->sequence) - 2];
            array_push($this->sequence, $next);
        }
        return array_slice($this->sequence, 0, $n);
    }
}

// Usage
$generator = FibonacciGenerator::getInstance();
echo implode(', ', $generator->generate(10));
?>
```