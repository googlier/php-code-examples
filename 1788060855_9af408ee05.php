```php
<?php
// Problem: Implement a function to calculate the nth Fibonacci number using the Singleton design pattern.

class FibonacciSingleton {
    private static $instance = null;
    private $fibonacci = [0, 1];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new FibonacciSingleton();
        }
        return self::$instance;
    }

    public function getFibonacci($n) {
        if (isset($this->fibonacci[$n])) {
            return $this->fibonacci[$n];
        }
        $this->fibonacci[$n] = $this->getFibonacci($n - 1) + $this->getFibonacci($n - 2);
        return $this->fibonacci[$n];
    }
}

// Usage
$fibSingleton = FibonacciSingleton::getInstance();
echo $fibSingleton->getFibonacci(10); // Output: 55
?>
```