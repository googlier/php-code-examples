```php
<?php
// Problem: Implement a simple user authentication system that allows users to register, login, and logout.
// Design Pattern: Singleton Pattern

class Authentication {
    private static $instance = null;
    private $users = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Authentication();
        }
        return self::$instance;
    }

    public function register($username, $password) {
        if (!isset($this->users[$username])) {
            $this->users[$username] = password_hash($password, PASSWORD_DEFAULT);
            return true;
        }
        return false;
    }

    public function login($username, $password) {
        if (isset($this->users[$username]) && password_verify($password, $this->users[$username])) {
            return true;
        }
        return false;
    }

    public function logout($username) {
        if (isset($this->users[$username])) {
            unset($this->users[$username]);
            return true;
        }
        return false;
    }
}

// Usage
$auth = Authentication::getInstance();
$auth->register('user1', 'password123');
echo $auth->login('user1', 'password123') ? 'Login successful' : 'Login failed';
$auth->logout('user1');
echo $auth->login('user1', 'password123') ? 'Login successful' : 'Login failed';
?>
```