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
            $observer->update($this);
        }
    }
}

interface Observer {
    public function update(Subject $subject);
}

class ConcreteObserver implements Observer {
    public function update(Subject $subject) {
        echo "Observer: Received notification\n";
    }
}

$subject = new Subject();
$observer = new ConcreteObserver();
$subject->attach($observer);
$subject->notify();
?>
```