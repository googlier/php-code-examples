```php
<?php

// Problem: Implement a function to calculate the nth Fibonacci number using the Observer design pattern.

// Design Pattern: Observer

// Subject interface
interface Subject {
    public function attach(Observer $observer);
    public function detach(Observer $observer);
    public function notify();
}

// Observer interface
interface Observer {
    public function update($fibNumber);
}

// FibonacciSubject class
class FibonacciSubject implements Subject {
    private $observers = [];
    private $fibNumber = 0;
    private $lastFibNumber = 0;

    public function attach(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer) {
        $key = array_search($observer, $this->observers, true);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }

    public function notify() {
        foreach ($this->observers as $observer) {
            $observer->update($this->fibNumber);
        }
    }

    public function calculateFib($n) {
        if ($n == 0) {
            $this->fibNumber = 0;
        } elseif ($n == 1) {
            $this->fibNumber = 1;
        } else {
            $temp = $this->fibNumber;
            $this->fibNumber += $this->lastFibNumber;
            $this->lastFibNumber = $temp;
        }
        $this->notify();
    }
}

// FibonacciObserver class
class FibonacciObserver implements Observer {
    public function update($fibNumber) {
        echo "Fibonacci number: " . $fibNumber . "\n";
    }
}

// Usage
$subject = new FibonacciSubject();
$observer = new FibonacciObserver();

$subject->attach($observer);

for ($i = 0; $i <= 10; $i++) {
    $subject->calculateFib($i);
}
?>
```