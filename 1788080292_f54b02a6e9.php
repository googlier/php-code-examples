```php
<?php
// Define a simple User class
class User {
    public $name;
    public $email;

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

// Implement a Singleton pattern to manage User instances
class UserManager {
    private static $instance = null;
    private $users = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new UserManager();
        }
        return self::$instance;
    }

    public function addUser(User $user) {
        $this->users[$user->getEmail()] = $user;
    }

    public function getUser($email) {
        return isset($this->users[$email]) ? $this->users[$email] : null;
    }
}

// Usage
$userManager = UserManager::getInstance();
$userManager->addUser(new User('John Doe', 'john@example.com'));
$user = $userManager->getUser('john@example.com');

echo $user->getName() . ' < ' . $user->getEmail();
?>
```