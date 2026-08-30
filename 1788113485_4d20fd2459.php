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

// Define a class to represent a user with a username and email
class User {
    private $username;
    private $email;

    public function __construct($username, $email) {
        $this->username = $username;
        $this->email = $email;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getEmail() {
        return $this->email;
    }
}

// Define a class to represent a user repository with a collection of users
class UserRepository {
    private $users = [];

    public function addUser(User $user) {
        $this->users[] = $user;
    }

    public function getUserByUsername($username) {
        foreach ($this->users as $user) {
            if ($user->getUsername() === $username) {
                return $user;
            }
        }
        return null;
    }
}

// Use the factory design pattern to create users
class UserFactory {
    public static function createUser($username, $email) {
        return new User($username, $email);
    }
}

// Use the repository pattern to manage users
$userRepository = new UserRepository();
$user1 = UserFactory::createUser('user1', 'user1@example.com');
$user2 = UserFactory::createUser('user2', 'user2@example.com');
$userRepository->addUser($user1);
$userRepository->addUser($user2);

// Use the observer pattern to notify users about a new message
class UserObserver {
    public function notifyUser(User $user, $message) {
        echo $user->getUsername() . ' received a new message: ' . $message . "\n";
    }
}

$observer = new UserObserver();
$observer->notifyUser($user1, 'Hello, this is a new message!');
$observer->notifyUser($user2, 'Hello, this is another message!');

?>
```