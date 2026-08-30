```php
<?php
// Random Problem: Implement a function to calculate the nth Fibonacci number using the Flyweight design pattern

// Flyweight Interface
interface FibonacciFlyweight {
    public function calculate($n): int;
}

// Concrete Flyweight
class FibonacciFlyweightImpl implements FibonacciFlyweight {
    public function calculate($n): int {
        if ($n <= 1) return $n;
        return $this->calculate($n - 1) + $this->calculate($n - 2);
    }
}

// Flyweight Factory
class FibonacciFlyweightFactory {
    private $flyweights = [];

    public function getFlyweight($key): FibonacciFlyweight {
        if (!isset($this->flyweights[$key])) {
            $this->flyweights[$key] = new FibonacciFlyweightImpl();
        }
        return $this->flyweights[$key];
    }
}

// Client
$factory = new FibonacciFlyweightFactory();
$n = 10;
$fib = $factory->getFlyweight($n);
echo $fib->calculate($n);
?>
```