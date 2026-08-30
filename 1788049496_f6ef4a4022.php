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

    public function generateRandomNumber() {
        return rand(1, 100);
    }
}

class NumberProcessor {
    private $singleton;

    public function __construct(Singleton $singleton) {
        $this->singleton = $singleton;
    }

    public function processNumber() {
        $number = $this->singleton->generateRandomNumber();
        return $number * 2;
    }
}

$singleton = Singleton::getInstance();
$processor = new NumberProcessor($singleton);
echo $processor->processNumber();
?>
```