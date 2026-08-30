```php
<?php

// Problem: Implement a system to manage user roles with permissions.
// Design Pattern: Strategy Pattern

class Role {
    protected $permissions = [];

    public function addPermission($permission) {
        $this->permissions[] = $permission;
    }

    public function hasPermission($permission) {
        return in_array($permission, $this->permissions);
    }
}

interface RoleStrategy {
    public function getPermissions();
}

class AdminRoleStrategy implements RoleStrategy {
    public function getPermissions() {
        return ['create', 'read', 'update', 'delete'];
    }
}

class UserRoleStrategy implements RoleStrategy {
    public function getPermissions() {
        return ['read', 'update'];
    }
}

class RoleManager {
    protected $roleStrategies = [];

    public function addRoleStrategy($role, RoleStrategy $strategy) {
        $this->roleStrategies[$role] = $strategy;
    }

    public function getRole($role) {
        if (!isset($this->roleStrategies[$role])) {
            throw new Exception("Role not found");
        }
        return $this->roleStrategies[$role];
    }
}

$userRoleManager = new RoleManager();
$userRoleManager->addRoleStrategy('admin', new AdminRoleStrategy());
$userRoleManager->addRoleStrategy('user', new UserRoleStrategy());

$userRole = $userRoleManager->getRole('admin');
$user = new Role();
foreach ($userRole->getPermissions() as $permission) {
    $user->addPermission($permission);
}

var_dump($user->hasPermission('create')); // bool(true)
var_dump($user->hasPermission('delete')); // bool(true)

?>
```