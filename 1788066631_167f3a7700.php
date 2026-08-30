```php
<?php
// Generate a random string of length 10
$length = 10;
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$randomString = '';
for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, strlen($characters) - 1)];
}

// Implement Singleton Design Pattern to ensure the random string is generated only once
class RandomStringGenerator {
    private static $instance = null;
    private $randomString;

    private function __construct() {
        $this->randomString = $randomString;
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new RandomStringGenerator();
        }
        return self::$instance;
    }

    public function getRandomString() {
        return $this->randomString;
    }
}

// Get the singleton instance and retrieve the random string
$generator = RandomStringGenerator::getInstance();
$randomString = $generator->getRandomString();

// Output the random string
echo $randomString;
?>
```