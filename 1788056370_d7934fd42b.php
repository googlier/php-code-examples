```php
<?php

// Problem: Implement a function to find the nth Fibonacci number using the Observer design pattern.

interface Observer {
    public function update($fibonacciNumber);
}

class FibonacciSubject {
    private $observers = [];
    private $fibonacciNumber;

    public function attach(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer) {
        $key = array_search($observer, $this->observers);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }

    public function notify() {
        foreach ($this->observers as $observer) {
            $observer->update($this->fibonacciNumber);
        }
    }

    public function calculateFibonacci($n) {
        $this->fibonacciNumber = $this->fibonacci($n);
        $this->notify();
    }

    private function fibonacci($n) {
        if ($n <= 1) {
            return $n;
        }
        $a = 0;
        $b = 1;
        for ($i = 2; $i <= $n; $i++) {
            $temp = $a;
            $a = $b;
            $b = $temp + $b;
        }
        return $a;
    }
}

class FibonacciDisplay implements Observer {
    public function update($fibonacciNumber) {
        echo "Fibonacci Number: " . $fibonacciNumber . "\n";
    }
}

$subject = new FibonacciSubject();
$observer = new FibonacciDisplay();

$subject->attach($observer);
$subject->calculateFibonacci(10);

?>
```