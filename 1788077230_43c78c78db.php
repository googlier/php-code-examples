```php
<?php
class User {
    private $name;
    private $email;

    public function __construct($name, $email) {
        $this->name = $name;
        $this->email = $email;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }
}

interface NotificationStrategy {
    public function sendNotification($message);
}

class EmailNotificationStrategy implements NotificationStrategy {
    public function sendNotification($message) {
        echo "Sending email: $message";
    }
}

class SMSNotificationStrategy implements NotificationStrategy {
    public function sendNotification($message) {
        echo "Sending SMS: $message";
    }
}

class NotificationContext {
    private $strategy;

    public function setStrategy(NotificationStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function notify($message) {
        $this->strategy->sendNotification($message);
    }
}

$user = new User("John Doe", "john@example.com");
$notificationContext = new NotificationContext();

// Randomly choose between Email and SMS notification
$notificationType = rand(0, 1) ? "Email" : "SMS";

if ($notificationType === "Email") {
    $notificationContext->setStrategy(new EmailNotificationStrategy());
} else {
    $notificationContext->setStrategy(new SMSNotificationStrategy());
}

$notificationContext->notify("Hello, " . $user->getName() . "!");
?>
```