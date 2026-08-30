```php
<?php
// Problem: Implement a system to manage user permissions using the Strategy Pattern

class PermissionStrategy {
    abstract public function checkPermission($user);
}

class AdminPermissionStrategy extends PermissionStrategy {
    public function checkPermission($user) {
        return $user['role'] === 'admin';
    }
}

class EditorPermissionStrategy extends PermissionStrategy {
    public function checkPermission($user) {
        return $user['role'] === 'admin' || $user['role'] === 'editor';
    }
}

class ViewerPermissionStrategy extends PermissionStrategy {
    public function checkPermission($user) {
        return true;
    }
}

class PermissionManager {
    private $strategy;

    public function setStrategy(PermissionStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function check($user) {
        return $this->strategy->checkPermission($user);
    }
}

// Usage
$user = ['role' => 'editor'];
$manager = new PermissionManager();
$manager->setStrategy(new EditorPermissionStrategy());

if ($manager->check($user)) {
    echo "Permission granted";
} else {
    echo "Permission denied";
}
?>
```