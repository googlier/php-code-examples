```php
<?php

// Define a class that implements the Singleton design pattern
class DatabaseConnection {
    private static $instance = null;

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new DatabaseConnection();
        }
        return self::$instance;
    }

    public function query($sql) {
        echo "Executing query: " . $sql;
    }
}

// Usage of the Singleton class
$connection = DatabaseConnection::getInstance();
$connection->query("SELECT * FROM users");

?>
```