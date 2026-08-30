```php
<?php

// Define a class to handle database operations
class Database
{
    private $host = 'localhost';
    private $db = 'test_db';
    private $user = 'root';
    private $pass = '';
    private $conn;

    public function connect()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db, $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
        }

        return $this->conn;
    }
}

// Implement the Singleton design pattern to ensure only one instance of Database is created
class DatabaseSingleton extends Database
{
    private static $instance = null;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new DatabaseSingleton();
        }
        return self::$instance;
    }
}

// Usage of the Singleton instance
$db = DatabaseSingleton::getInstance();
$conn = $db->connect();

// Example query to fetch data from the database
$stmt = $conn->prepare("SELECT * FROM users WHERE age > :age");
$stmt->bindParam(':age', $age);
$age = 25;
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo $row['name'] . " - " . $row['email'] . "<br>";
}
?>
```