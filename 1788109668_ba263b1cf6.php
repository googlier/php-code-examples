```php
<?php
// Problem: Implement a simple caching mechanism for storing user data
// Design Pattern: Flyweight

class UserData {
    private $data;

    public function __construct($data) {
        $this->data = $data;
    }

    public function getData() {
        return $this->data;
    }
}

class UserDataFactory {
    private static $cache = [];

    public static function getUserData($id) {
        if (!isset(self::$cache[$id])) {
            // Simulate data fetching from a database
            $data = "Data for user $id";
            self::$cache[$id] = new UserData($data);
        }
        return self::$cache[$id];
    }
}

// Usage
$userData1 = UserDataFactory::getUserData(1);
$userData2 = UserDataFactory::getUserData(1);

echo $userData1->getData(); // Output: Data for user 1
echo $userData2->getData(); // Output: Data for user 1 (same object)

echo $userData1 === $userData2 ? 'Same object' : 'Different objects'; // Output: Same object
?>
```