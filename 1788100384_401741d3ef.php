```php
<?php

class User {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }
}

class UserManager {
    private $users = [];

    public function addUser(User $user) {
        $this->users[] = $user;
    }

    public function getUserCount() {
        return count($this->users);
    }

    public function getUsers() {
        return $this->users;
    }
}

class UserFactory {
    public static function createUser($name) {
        return new User($name);
    }
}

class UserService {
    private $userManager;

    public function __construct(UserManager $userManager) {
        $this->userManager = $userManager;
    }

    public function registerUser($name) {
        $user = UserFactory::createUser($name);
        $this->userManager->addUser($user);
    }

    public function getUserCount() {
        return $this->userManager->getUserCount();
    }

    public function getAllUsers() {
        return $this->userManager->getUsers();
    }
}

$userManager = new UserManager();
$userService = new UserService($userManager);

$userService->registerUser("Alice");
$userService->registerUser("Bob");

echo "Number of users: " . $userService->getUserCount() . "<br>";
echo "All users: ";
foreach ($userService->getAllUsers() as $user) {
    echo $user->getName() . " ";
}
?>
```