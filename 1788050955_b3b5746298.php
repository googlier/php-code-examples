```php
<?php

class Singleton {
    private static $instance = null;

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }

    public function showMessage() {
        echo "Hello, World!";
    }
}

$singletonInstance = Singleton::getInstance();
$singletonInstance->showMessage();

?>
```