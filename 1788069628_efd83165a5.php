```php
<?php

class Subject {
    private $observers = [];

    public function attach($observer) {
        $this->observers[] = $observer;
    }

    public function detach($observer) {
        foreach ($this->observers as $key => $obs) {
            if ($obs === $observer) {
                unset($this->observers[$key]);
                break;
            }
        }
    }

    public function notify() {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}

interface Observer {
    public function update(Subject $subject);
}

class ConcreteObserver implements Observer {
    public function update(Subject $subject) {
        echo "ConcreteObserver: Received update from Subject\n";
    }
}

$subject = new Subject();
$observer = new ConcreteObserver();

$subject->attach($observer);
$subject->notify();

$subject->detach($observer);
$subject->notify();

?>
```