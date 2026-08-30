```php
<?php
// Generate a random number between 1 and 100
$number = rand(1, 100);

// Define a class to encapsulate the number generation logic
class NumberGenerator {
    private $number;

    public function __construct($number) {
        $this->number = $number;
    }

    public function getNumber() {
        return $this->number;
    }
}

// Implement the Singleton design pattern to ensure only one instance of NumberGenerator is created
class SingletonNumberGenerator {
    private static $instance = null;
    private $number;

    private function __construct($number) {
        $this->number = $number;
    }

    public static function getInstance($number) {
        if (self::$instance === null) {
            self::$instance = new SingletonNumberGenerator($number);
        }
        return self::$instance;
    }

    public function getNumber() {
        return $this->number;
    }
}

// Use the Singleton design pattern to get the instance of NumberGenerator
$singletonGenerator = SingletonNumberGenerator::getInstance($number);

// Output the number
echo "Random Number: " . $singletonGenerator->getNumber();
?>
```