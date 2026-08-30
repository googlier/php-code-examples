```php
<?php
class Subject {
    private $observers = [];

    public function attach($observer) {
        $this->observers[] = $observer;
    }

    public function detach($observer) {
        $key = array_search($observer, $this->observers, true);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }

    public function notify() {
        foreach ($this->observers as $observer) {
            $observer->update();
        }
    }
}

interface Observer {
    public function update();
}

class ConcreteObserverA implements Observer {
    public function update() {
        echo "ConcreteObserverA received notification\n";
    }
}

class ConcreteObserverB implements Observer {
    public function update() {
        echo "ConcreteObserverB received notification\n";
    }
}

$subject = new Subject();
$observerA = new ConcreteObserverA();
$observerB = new ConcreteObserverB();

$subject->attach($observerA);
$subject->attach($observerB);

$subject->notify();

$subject->detach($observerA);

$subject->notify();
?>
```