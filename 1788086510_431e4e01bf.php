```php
<?php
// Define a class that implements the Singleton Design Pattern
class DatabaseConnection {
    private static $instance = null;
    private $connection;

    private function __construct() {
        $this->connection = new mysqli("localhost", "username", "password", "database");
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new DatabaseConnection();
        }
        return self::$instance;
    }

    public function query($sql) {
        return $this->connection->query($sql);
    }

    public function close() {
        $this->connection->close();
    }
}

// Usage example
$db = DatabaseConnection::getInstance();
$result = $db->query("SELECT * FROM users");
while ($row = $result->fetch_assoc()) {
    echo $row['username'] . "<br>";
}
$db->close();
?>
```