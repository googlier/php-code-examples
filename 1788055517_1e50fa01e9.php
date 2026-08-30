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
        return "Singleton Instance";
    }
}

class Proxy {
    private $singleton;

    public function __construct() {
        $this->singleton = Singleton::getInstance();
    }

    public function showMessage() {
        return $this->singleton->showMessage();
    }
}

$proxy = new Proxy();
echo $proxy->showMessage();
?>
```