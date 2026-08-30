```php
<?php

// Define a function to generate a random string of a given length
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// Define a class to represent a user with username and password properties
class User {
    public $username;
    public $password;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }
}

// Define a class to represent a UserRepository using Singleton pattern
class UserRepository {
    private static $instance = null;

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new UserRepository();
        }
        return self::$instance;
    }

    private $users = [];

    public function addUser(User $user) {
        $this->users[$user->username] = $user;
    }

    public function getUserByUsername($username) {
        return isset($this->users[$username]) ? $this->users[$username] : null;
    }
}

// Create a user and add it to the repository
$user = new User(generateRandomString(), generateRandomString());
UserRepository::getInstance()->addUser($user);

// Retrieve the user from the repository
$userFromRepo = UserRepository::getInstance()->getUserByUsername($user->username);

// Output the username and password of the retrieved user
echo 'Username: ' . $userFromRepo->username . '<br>';
echo 'Password: ' . $userFromRepo->password . '<br>';

?>
```