```php
<?php
$numbers = range(1, 100);
shuffle($numbers);

$pattern = 'observer';

class NumberWatcher {
    protected $observers = [];

    public function addObserver(NumberObserver $observer) {
        $this->observers[] = $observer;
    }

    public function notify($number) {
        foreach ($this->observers as $observer) {
            $observer->update($number);
        }
    }
}

interface NumberObserver {
    public function update($number);
}

class OddNumberObserver implements NumberObserver {
    public function update($number) {
        if ($number % 2 !== 0) {
            echo "$number is odd\n";
        }
    }
}

class EvenNumberObserver implements NumberObserver {
    public function update($number) {
        if ($number % 2 === 0) {
            echo "$number is even\n";
        }
    }
}

$watcher = new NumberWatcher();
$watcher->addObserver(new OddNumberObserver());
$watcher->addObserver(new EvenNumberObserver());

foreach ($numbers as $number) {
    $watcher->notify($number);
}
?>
```