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
        echo "Singleton Pattern Works!";
    }
}

$obj = Singleton::getInstance();
$obj->showMessage();
?>
```