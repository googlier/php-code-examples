```php
<?php

// Problem: Implement a simple user authentication system using the Singleton design pattern.

class Auth {
    private static $instance = null;
    private $users = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Auth();
        }
        return self::$instance;
    }

    public function addUser($username, $password) {
        $this->users[$username] = password_hash($password, PASSWORD_DEFAULT);
    }

    public function authenticate($username, $password) {
        if (isset($this->users[$username])) {
            return password_verify($password, $this->users[$username]);
        }
        return false;
    }
}

// Usage
$auth = Auth::getInstance();
$auth->addUser('user1', 'password123');

if ($auth->authenticate('user1', 'password123')) {
    echo 'Authentication successful!';
} else {
    echo 'Authentication failed!';
}
?>
```