```php
<?php

class DatabaseConnection {
    private $host;
    private $username;
    private $password;
    private $database;

    public function __construct($host, $username, $password, $database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    public function connect() {
        return new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
    }
}

class UserRepository {
    private $dbConnection;

    public function __construct(DatabaseConnection $dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    public function getUser($id) {
        $conn = $this->dbConnection->connect();
        $stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

class UserService {
    private $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function getUserDetails($id) {
        return $this->userRepository->getUser($id);
    }
}

$dbConnection = new DatabaseConnection('localhost', 'root', '', 'test_db');
$userRepository = new UserRepository($dbConnection);
$userService = new UserService($userRepository);

$userDetails = $userService->getUserDetails(1);
print_r($userDetails);

?>
```