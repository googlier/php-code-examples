```php
<?php
class User {
    private $id;
    private $name;

    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }
}

class UserService {
    public function getUserById($id) {
        // Simulate database query
        $users = [
            1 => new User(1, "John Doe"),
            2 => new User(2, "Jane Doe")
        ];
        return $users[$id];
    }
}

class UserController {
    private $userService;

    public function __construct($userService) {
        $this->userService = $userService;
    }

    public function displayUser($id) {
        $user = $this->userService->getUserById($id);
        echo "User ID: " . $user->getId() . ", Name: " . $user->getName();
    }
}

// Usage
$userService = new UserService();
$userController = new UserController($userService);
$userController->displayUser(1);
?>
```