```php
<?php

class Singleton {
    private static $instance = null;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }
}

class Database {
    private $connection;

    private function __construct() {
        $this->connection = new mysqli("localhost", "username", "password", "database");
    }

    public function query($sql) {
        return $this->connection->query($sql);
    }

    public function close() {
        $this->connection->close();
    }

    public static function getInstance() {
        return Singleton::getInstance();
    }
}

$database = Database::getInstance();
$result = $database->query("SELECT * FROM users");
while ($row = $result->fetch_assoc()) {
    echo $row['username'] . "<br>";
}
$database->close();

?>
```