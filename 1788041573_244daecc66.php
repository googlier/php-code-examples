```php
<?php

// Problem: Implement a system to manage user permissions with a design pattern

class User {
    public $name;
    public $permissions = [];

    public function __construct($name) {
        $this->name = $name;
    }

    public function addPermission($permission) {
        $this->permissions[] = $permission;
    }

    public function hasPermission($permission) {
        return in_array($permission, $this->permissions);
    }
}

class PermissionManager {
    private $users = [];

    public function addUser(User $user) {
        $this->users[$user->name] = $user;
    }

    public function userCan($userName, $permission) {
        if (isset($this->users[$userName])) {
            return $this->users[$userName]->hasPermission($permission);
        }
        return false;
    }
}

// Usage
$userManager = new PermissionManager();
$user1 = new User('Alice');
$user2 = new User('Bob');

$user1->addPermission('edit');
$user1->addPermission('delete');
$user2->addPermission('read');

$userManager->addUser($user1);
$userManager->addUser($user2);

var_dump($userManager->userCan('Alice', 'edit')); // bool(true)
var_dump($userManager->userCan('Bob', 'delete')); // bool(false)

?>
```