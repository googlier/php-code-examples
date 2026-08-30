```php
<?php

class Database {
    private $host = "localhost";
    private $db_name = "test_db";
    private $username = "root";
    private $password = "";
    private $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
        }

        return $this->conn;
    }
}

class User {
    private $id;
    private $username;
    private $email;

    public function __construct($id, $username, $email) {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getEmail() {
        return $this->email;
    }
}

class UserService {
    private $db;
    private $table_name = "users";

    public function __construct($db) {
        $this->db = $db;
    }

    public function getUserById($id) {
        $query = "SELECT id, username, email FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $num = $stmt->rowCount();

        if($num > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $user = new User($row['id'], $row['username'], $row['email']);
            return $user;
        }

        return null;
    }
}

$db = new Database();
$db_connection = $db->getConnection();

$user_service = new UserService($db_connection);
$user = $user_service->getUserById(1);

if ($user != null) {
    echo "User ID: " . $user->getId() . "<br>";
    echo "Username: " . $user->getUsername() . "<br>";
    echo "Email: " . $user->getEmail() . "<br>";
} else {
    echo "User not found.";
}
?>
```