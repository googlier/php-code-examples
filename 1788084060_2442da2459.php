```php
<?php
// Generate a random string of 10 characters
$randomString = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789', 5)), 0, 10);

// Design Pattern: Singleton
class DatabaseConnection {
    private static $instance = null;
    private $connection;

    private function __construct() {
        $this->connection = new mysqli('localhost', 'username', 'password', 'database');
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new DatabaseConnection();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}

// Use the Singleton pattern to get the database connection
$db = DatabaseConnection::getInstance()->getConnection();

// Query the database to insert the random string
$sql = "INSERT INTO random_strings (string) VALUES (?)";
$stmt = $db->prepare($sql);
$stmt->bind_param("s", $randomString);
$stmt->execute();

// Close the statement and connection
$stmt->close();
$db->close();

echo "Random string '$randomString' inserted into database.";
?>
```