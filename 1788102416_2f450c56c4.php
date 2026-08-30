```php
<?php

// Define a class to represent a user
class User {
    public $name;
    public $email;

    public function __construct($name, $email) {
        $this->name = $name;
        $this->email = $email;
    }

    public function displayInfo() {
        return "Name: " . $this->name . ", Email: " . $this->email;
    }
}

// Define an interface for user repository
interface UserRepository {
    public function getUser($id);
}

// Implement the UserRepository interface using the Singleton pattern
class UserRepositorySingleton implements UserRepository {
    private static $instance = null;
    private $users = [];

    private function __construct() {
        $this->users = [
            1 => new User("John Doe", "john@example.com"),
            2 => new User("Jane Smith", "jane@example.com")
        ];
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new UserRepositorySingleton();
        }
        return self::$instance;
    }

    public function getUser($id) {
        return $this->users[$id] ?? null;
    }
}

// Usage
$userRepository = UserRepositorySingleton::getInstance();
$user = $userRepository->getUser(1);
echo $user->displayInfo();

?>
```