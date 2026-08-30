```php
<?php
// Random Programming Problem: Implement a Singleton Pattern in PHP to manage a Database Connection

// Design Pattern: Singleton Pattern

class Database {
    private static $instance = null;
    private $connection;

    // Private constructor to prevent instantiation
    private function __construct() {
        $this->connection = new mysqli('localhost', 'username', 'password', 'database');
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    // Static method to get the instance of the class
    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // Method to get the database connection
    public function getConnection() {
        return $this->connection;
    }
}

// Usage of Singleton Pattern
$db1 = Database::getInstance();
$db2 = Database::getInstance();

if ($db1 === $db2) {
    echo "Both variables hold the same instance.";
} else {
    echo "Both variables do not hold the same instance.";
}
?>
```