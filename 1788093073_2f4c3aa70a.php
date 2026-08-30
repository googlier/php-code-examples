```php
<?php
class Singleton {
    private static $instance = null;
    private $data = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }

    public function setData($key, $value) {
        $this->data[$key] = $value;
    }

    public function getData($key) {
        return isset($this->data[$key]) ? $this->data[$key] : null;
    }
}

class User {
    private $name;
    private $email;

    public function __construct($name, $email) {
        $this->name = $name;
        $this->email = $email;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }
}

$user = new User("John Doe", "john@example.com");
$singleton = Singleton::getInstance();
$singleton->setData('user', $user);

$userFromSingleton = $singleton->getData('user');
echo "Name: " . $userFromSingleton->getName() . "<br>";
echo "Email: " . $userFromSingleton->getEmail();
?>
```