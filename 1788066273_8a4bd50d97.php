```php
<?php
// Generate a random string of length 10
$length = 10;
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$randomString = substr(str_shuffle($characters), 0, $length);

// Problem: Implement a Singleton pattern to ensure that only one instance of a class is created

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

// Usage
$singleton1 = Singleton::getInstance();
$singleton2 = Singleton::getInstance();

echo ($singleton1 === $singleton2) ? "Same instance" : "Different instances";
?>
```