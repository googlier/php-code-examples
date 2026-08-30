```php
<?php

class Database {
    private $connection;

    public function __construct($host, $user, $password, $dbname) {
        $this->connection = new mysqli($host, $user, $password, $dbname);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function query($sql) {
        return $this->connection->query($sql);
    }

    public function close() {
        $this->connection->close();
    }
}

class UserRepository {
    private $database;

    public function __construct(Database $database) {
        $this->database = $database;
    }

    public function getUserById($id) {
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->database->connection->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_assoc();
    }
}

$database = new Database("localhost", "user", "password", "database_name");
$userRepository = new UserRepository($database);
$user = $userRepository->getUserById(1);
print_r($user);

$database->close();
?>
```