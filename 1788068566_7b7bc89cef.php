```php
<?php
// Problem: Implement a function to find the n-th Fibonacci number using the Decorator Design Pattern

interface Fibonacci {
    public function getNthFibonacci($n);
}

class BasicFibonacci implements Fibonacci {
    public function getNthFibonacci($n) {
        if ($n <= 0) return 0;
        if ($n == 1) return 1;
        return $this->getNthFibonacci($n - 1) + $this->getNthFibonacci($n - 2);
    }
}

class CachingFibonacci implements Fibonacci {
    private $fibonacci;
    public function __construct(Fibonacci $fibonacci) {
        $this->fibonacci = $fibonacci;
    }
    public function getNthFibonacci($n) {
        $cache = [];
        function helper($n, &$cache) {
            if ($n <= 0) return 0;
            if ($n == 1) return 1;
            if (isset($cache[$n])) return $cache[$n];
            $cache[$n] = helper($n - 1, $cache) + helper($n - 2, $cache);
            return $cache[$n];
        }
        return helper($n, $cache);
    }
}

$fibonacci = new CachingFibonacci(new BasicFibonacci());
echo $fibonacci->getNthFibonacci(10); // Output: 55
?>
```