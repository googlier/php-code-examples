```php
<?php

// Problem: Implement a function to calculate the nth Fibonacci number using the Decorator design pattern.

interface Fibonacci {
    public function calculate($n);
}

class BasicFibonacci implements Fibonacci {
    public function calculate($n) {
        if ($n <= 1) {
            return $n;
        }
        return $this->calculate($n - 1) + $this->calculate($n - 2);
    }
}

class MemoizationDecorator implements Fibonacci {
    private $fibonacci;

    public function __construct(Fibonacci $fibonacci) {
        $this->fibonacci = $fibonacci;
    }

    public function calculate($n) {
        static $cache = [];
        if (isset($cache[$n])) {
            return $cache[$n];
        }
        $cache[$n] = $this->fibonacci->calculate($n);
        return $cache[$n];
    }
}

$fibonacci = new BasicFibonacci();
$decoratedFibonacci = new MemoizationDecorator($fibonacci);

$n = 10;
echo "Fibonacci number at position $n is: " . $decoratedFibonacci->calculate($n);

?>
```