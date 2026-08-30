```php
<?php

// Define the problem: Generate a function that returns a random integer between 1 and 100

// Solution: Use the Singleton Design Pattern

class NumberGenerator {
    private static $instance = null;
    private $number;

    private function __construct() {
        $this->number = rand(1, 100);
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new NumberGenerator();
        }
        return self::$instance;
    }

    public function getNumber() {
        return $this->number;
    }
}

// Usage
$generator = NumberGenerator::getInstance();
echo $generator->getNumber();

?>
```