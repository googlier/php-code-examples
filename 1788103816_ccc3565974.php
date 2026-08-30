```php
<?php
$pattern = "Singleton";
$problem = "Create a PHP class that implements the Singleton design pattern.";

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

$singleton = Singleton::getInstance();
?>
```