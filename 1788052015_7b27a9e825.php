```php
<?php
// Problem: Implement a function to calculate the nth Fibonacci number using the Singleton design pattern.

class FibonacciSingleton {
    private static $instance = null;
    private $fibonacci = array(0, 1);

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new FibonacciSingleton();
        }
        return self::$instance;
    }

    public function getFibonacciNumber($n) {
        if (!isset($this->fibonacci[$n])) {
            $this->fibonacci[$n] = $this->getFibonacciNumber($n - 1) + $this->getFibonacciNumber($n - 2);
        }
        return $this->fibonacci[$n];
    }
}

$singleton = FibonacciSingleton::getInstance();
echo $singleton->getFibonacciNumber(10); // Output: 55
?>
```