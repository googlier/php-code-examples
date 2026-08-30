```php
<?php
// Problem: Create a function that generates a random string of a given length

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
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $this->characters[rand(0, strlen($this->characters) - 1)];
        }
        return $randomString;
    }
}

// Usage
$generator = RandomStringGenerator::getInstance();
echo $generator->generate(10); // Outputs a random string of length 10
?>
```