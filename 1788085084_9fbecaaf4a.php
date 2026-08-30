```php
<?php
// Define a random design pattern - Singleton
class DatabaseConnection {
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
            self::$instance = new DatabaseConnection();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}

// Define a random programming problem - Fetch all users from a database
$users = DatabaseConnection::getInstance()->getConnection()->query("SELECT * FROM users");

while ($row = $users->fetch_assoc()) {
    echo "ID: " . $row['id'] . " Name: " . $row['name'] . "<br>";
}
?>
```