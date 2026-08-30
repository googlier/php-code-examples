```php
<?php

// Define a RandomNumberGenerator class using the Singleton design pattern
class RandomNumberGenerator {
    private static $instance;
    private $numbers;

    private function __construct() {
        $this->numbers = range(1, 100);
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getRandomNumber() {
        $key = array_rand($this->numbers);
        return $this->numbers[$key];
    }
}

// Usage
$generator = RandomNumberGenerator::getInstance();
echo $generator->getRandomNumber();
?>
```