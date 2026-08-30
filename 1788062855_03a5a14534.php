```php
<?php
// Problem: Implement a function to calculate the nth Fibonacci number using the Singleton design pattern.

class Fibonacci {
    private static $instance = null;
    private $cache = array();

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Fibonacci();
        }
        return self::$instance;
    }

    public function getNumber($n) {
        if (!array_key_exists($n, $this->cache)) {
            if ($n <= 1) {
                $this->cache[$n] = $n;
            } else {
                $this->cache[$n] = $this->getNumber($n - 1) + $this->getNumber($n - 2);
            }
        }
        return $this->cache[$n];
    }
}

$n = 10;
$fibonacci = Fibonacci::getInstance();
echo "The " . $n . "th Fibonacci number is: " . $fibonacci->getNumber($n);
?>
```