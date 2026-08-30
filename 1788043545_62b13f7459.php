```php
<?php
// Random Problem: Implement a function to find the second largest number in an array without sorting the array.

// Random Design Pattern: Observer Pattern

class Observer {
    public function update($value) {
        echo "Observer received value: $value\n";
    }
}

class Subject {
    private $observers = [];
    private $secondLargest = null;

    public function addObserver(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function setSecondLargest($value) {
        $this->secondLargest = $value;
        foreach ($this->observers as $observer) {
            $observer->update($value);
        }
    }

    public function findSecondLargest($array) {
        $first = $second = PHP_INT_MIN;
        foreach ($array as $num) {
            if ($num > $first) {
                $second = $first;
                $first = $num;
            } elseif ($num > $second && $num != $first) {
                $second = $num;
            }
        }
        $this->setSecondLargest($second);
    }
}

$subject = new Subject();
$observer1 = new Observer();
$observer2 = new Observer();

$subject->addObserver($observer1);
$subject->addObserver($observer2);

$subject->findSecondLargest([10, 20, 8, 30, 40, 45]);
?>
```