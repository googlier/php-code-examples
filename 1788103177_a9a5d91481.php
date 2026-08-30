```php
<?php
// Generate a random string
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// Implement the Singleton Design Pattern
class RandomStringGenerator {
    private static $instance = null;
    private $randomString;

    private function __construct() {
        $this->randomString = generateRandomString();
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getRandomString() {
        return $this->randomString;
    }
}

// Usage
$generator = RandomStringGenerator::getInstance();
echo $generator->getRandomString();
?>
```