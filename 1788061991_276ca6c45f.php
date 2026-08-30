```php
<?php

// Define a class to generate random numbers within a given range
class RandomNumberGenerator {
    public function generate($min, $max) {
        return mt_rand($min, $max);
    }
}

// Design pattern: Singleton
class RandomNumberService {
    private static $instance = null;

    private $generator;

    private function __construct() {
        $this->generator = new RandomNumberGenerator();
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getRandomNumber($min, $max) {
        return $this->generator->generate($min, $max);
    }
}

// Usage
echo RandomNumberService::getInstance()->getRandomNumber(1, 100);

?>
```