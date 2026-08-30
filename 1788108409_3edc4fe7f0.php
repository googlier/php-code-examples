```php
<?php

class Singleton {
    private static $instance = null;

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }
}

class Database {
    private $connection;

    private function __construct() {
        $this->connection = new mysqli('localhost', 'username', 'password', 'database');
    }

    public function query($sql) {
        return $this->connection->query($sql);
    }

    public function close() {
        $this->connection->close();
    }
}

class SingletonDatabase extends Singleton {
    private $database;

    private function __construct() {
        parent::__construct();
        $this->database = new Database();
    }

    public function getDatabase() {
        return $this->database;
    }
}

class User {
    private $id;
    private $name;
    private $email;

    public function __construct($id, $name, $email) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }
}

class UserManager {
    public function getUser($id) {
        $db = SingletonDatabase::getInstance()->getDatabase();
        $result = $db->query("SELECT * FROM users WHERE id = $id");
        $user = $result->fetch_object('User');
        return $user;
    }
}

$userManager = new UserManager();
$user = $userManager->getUser(1);
echo "User ID: " . $user->getId() . ", Name: " . $user->getName() . ", Email: " . $user->getEmail();

?>
```