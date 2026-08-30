```php
<?php

// Problem: Implement a function to calculate the Fibonacci sequence up to a given number using the Singleton design pattern.

class Fibonacci {
    private static $instance = null;
    private $sequence = [0, 1];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Fibonacci();
        }
        return self::$instance;
    }

    public function calculate($n) {
        if ($n <= 1) return $this->sequence[$n];
        while (count($this->sequence) < $n + 1) {
            $this->sequence[] = $this->sequence[count($this->sequence) - 1] + $this->sequence[count($this->sequence) - 2];
        }
        return $this->sequence[$n];
    }
}

$fibonacci = Fibonacci::getInstance();
echo $fibonacci->calculate(10); // Output: 55
?>
```