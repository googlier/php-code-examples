```php
<?php
$numbers = range(1, 100);
shuffle($numbers);

$observer = new Observer();
$observer->setSubject($numbers);

foreach ($numbers as $number) {
    $observer->update($number);
}

class Observer {
    private $subject = null;

    public function setSubject($subject) {
        $this->subject = $subject;
    }

    public function update($number) {
        if ($number % 2 === 0) {
            echo "Even Number: " . $number . "<br>";
        } else {
            echo "Odd Number: " . $number . "<br>";
        }
    }
}
?>
```