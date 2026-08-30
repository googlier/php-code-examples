```php
<?php
// Generate a random array of integers
$numbers = range(1, 100);

// Shuffle the array
shuffle($numbers);

// Define a random design pattern (Observer)
class Observer {
    public function update($data) {
        echo "Data updated: " . implode(", ", $data) . "\n";
    }
}

class Subject {
    private $observers = [];

    public function attach(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function notify() {
        foreach ($this->observers as $observer) {
            $observer->update($this->numbers);
        }
    }

    public function setNumbers($numbers) {
        $this->numbers = $numbers;
        $this->notify();
    }
}

// Create an observer and a subject
$observer = new Observer();
$subject = new Subject();

// Attach the observer to the subject
$subject->attach($observer);

// Set the shuffled numbers to the subject
$subject->setNumbers($numbers);
?>
```