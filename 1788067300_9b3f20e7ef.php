```php
<?php
// Problem: Implement a simple user authentication system that checks if a user is allowed to access a resource based on their role.

// Design Pattern: Strategy

// User roles
define('ROLE_ADMIN', 'admin');
define('ROLE_USER', 'user');

// Interface for authentication strategies
interface AuthenticationStrategy {
    public function canAccess($userRole);
}

// Concrete strategy for admin role
class AdminAuthenticationStrategy implements AuthenticationStrategy {
    public function canAccess($userRole) {
        return $userRole === ROLE_ADMIN;
    }
}

// Concrete strategy for user role
class UserAuthenticationStrategy implements AuthenticationStrategy {
    public function canAccess($userRole) {
        return $userRole === ROLE_USER;
    }
}

// Context class to use authentication strategies
class AuthenticationContext {
    private $strategy;

    public function setStrategy(AuthenticationStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function checkAccess($userRole) {
        return $this->strategy->canAccess($userRole);
    }
}

// Usage
$userRole = ROLE_ADMIN; // This can be dynamically set based on user input
$context = new AuthenticationContext();
$context->setStrategy(new AdminAuthenticationStrategy());

if ($context->checkAccess($userRole)) {
    echo "Access granted!";
} else {
    echo "Access denied!";
}
?>
```