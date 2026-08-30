```php
<?php
// Problem: Create a function that generates a random string of a given length.

// Design Pattern: Singleton

class RandomStringGenerator {
    private static $instance = null;
    private $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new RandomStringGenerator();
        }
        return self::$instance;
    }

    public function generate($length) {
        $result = '';
        for ($i = 0; $i < $length; $i++) {
            $result .= $this->characters[rand(0, strlen($this->characters) - 1)];
        }
        return $result;
    }
}

// Usage
echo RandomStringGenerator::getInstance()->generate(10);
?>
```