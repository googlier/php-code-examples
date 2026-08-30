```php
<?php

// Problem: Implement a system that allows for the creation of different types of notifications (email, SMS, push notification) with a common interface.

// Design Pattern: Strategy Pattern

// Interface for Notification Strategy
interface NotificationStrategy {
    public function send($message);
}

// Concrete Strategy: Email Notification
class EmailNotification implements NotificationStrategy {
    public function send($message) {
        echo "Sending email: " . $message . "\n";
    }
}

// Concrete Strategy: SMS Notification
class SMSNotification implements NotificationStrategy {
    public function send($message) {
        echo "Sending SMS: " . $message . "\n";
    }
}

// Concrete Strategy: Push Notification
class PushNotification implements NotificationStrategy {
    public function send($message) {
        echo "Sending push notification: " . $message . "\n";
    }
}

// Context
class NotificationContext {
    private $strategy;

    public function __construct(NotificationStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(NotificationStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function notify($message) {
        $this->strategy->send($message);
    }
}

// Usage
$email = new EmailNotification();
$sms = new SMSNotification();
$push = new PushNotification();

$context = new NotificationContext($email);
$context->notify("Hello, this is an email notification!");

$context->setStrategy($sms);
$context->notify("Hello, this is an SMS notification!");

$context->setStrategy($push);
$context->notify("Hello, this is a push notification!");
?>
```