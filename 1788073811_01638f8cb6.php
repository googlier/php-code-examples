```php
<?php
// Random Programming Problem: Implement a Singleton Pattern to create a database connection.

// Design Pattern: Singleton Pattern

class Database {
    private static $instance = null;
    private $connection;

    private function __construct() {
        $this->connection = new mysqli('localhost', 'username', 'password', 'database');
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }

    public function __destruct() {
        $this->connection->close();
    }
}

// Usage
$db = Database::getInstance();
$conn = $db->getConnection();
echo "Database connection established successfully.";
?>
```