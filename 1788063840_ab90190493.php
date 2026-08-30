```php
<?php
// Problem: Implement a function that generates a random string of a given length.

// Design Pattern: Singleton

class RandomStringGenerator {
    private static $instance = null;
    private $characters;

    private function __construct($length) {
        $this->characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $this->length = $length;
    }

    public static function getInstance($length) {
        if (self::$instance === null) {
            self::$instance = new RandomStringGenerator($length);
        }
        return self::$instance;
    }

    public function generate() {
        $randomString = '';
        for ($i = 0; $i < $this->length; $i++) {
            $randomString .= $this->characters[rand(0, strlen($this->characters) - 1)];
        }
        return $randomString;
    }
}

// Usage
$length = 10;
$generator = RandomStringGenerator::getInstance($length);
echo $generator->generate();
?>
```