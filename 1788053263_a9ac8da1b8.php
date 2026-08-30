```php
<?php

class Subject {
    private $observers = [];
    public function attach($observer) {
        $this->observers[] = $observer;
    }
    public function detach($observer) {
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
}

class Observer {
    public function update($subject) {
        echo "Observer: Subject has changed!\n";
    }
}

$subject = new Subject();
$observer = new Observer();
$subject->attach($observer);
$subject->notify();

?>
```