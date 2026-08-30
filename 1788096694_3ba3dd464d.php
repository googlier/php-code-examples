```php
<?php
class Subject {
    private $observers = [];

    public function attach($observer) {
        $this->observers[] = $observer;
    }

    public function notify($message) {
        foreach ($this->observers as $observer) {
            $observer->update($message);
        }
    }
}

interface Observer {
    public function update($message);
}

class EmailObserver implements Observer {
    public function update($message) {
        echo "Email sent: $message\n";
    }
}

class SMSObserver implements Observer {
    public function update($message) {
        echo "SMS sent: $message\n";
    }
}

$subject = new Subject();
$emailObserver = new EmailObserver();
$smsObserver = new SMSObserver();

$subject->attach($emailObserver);
$subject->attach($smsObserver);

$subject->notify("New product launched!");
?>
```