```php
<?php
class Subject {
    private $observers = [];
    private $state;

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
            $observer->update($this);
        }
    }

    public function setState($state) {
        $this->state = $state;
        $this->notify();
    }

    public function getState() {
        return $this->state;
    }
}

interface Observer {
    public function update(Subject $subject);
}

class ConcreteObserver implements Observer {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function update(Subject $subject) {
        echo $this->name . " received update. New state: " . $subject->getState() . "\n";
    }
}

$subject = new Subject();
$observer1 = new ConcreteObserver("Observer 1");
$observer2 = new ConcreteObserver("Observer 2");

$subject->attach($observer1);
$subject->attach($observer2);

$subject->setState("State 1");
$subject->setState("State 2");
?>
```