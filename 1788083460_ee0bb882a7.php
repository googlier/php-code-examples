```php
<?php

// Define a class to handle user registration
class UserRegistration {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function registerUser($username, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        return $stmt->execute();
    }
}

// Usage
$db = new PDO('mysql:host=localhost;dbname=test', 'username', 'password');
$registration = new UserRegistration($db);
$username = "john_doe";
$email = "john@example.com";
$password = "securepassword123";
$registration->registerUser($username, $email, $password);

?>
```